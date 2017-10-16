<?php
class Home_model extends CI_Model
{
	public function __construct()
		{
			parent::__construct();
		}
	public function login($username,$password)
		{
            $this->db->where("(username='".$username."' or email='".$username."')")
           			 ->where("password","md5(concat(`auth_key`,'".$password."'))",FALSE);
            $dbh=$this->db->get("poll_users");
            if($dbh)
            	{
		            if($dbh->num_rows()>0)
		            	{
		            		return $dbh->row();
		            	}
		            else
		            	{
		            		return (object)array("error"=>"invalid username or password");
		            	}
	            }
	        else
	         	{
	         		return $this->db->error();
	         	}
		}
	public function changepassrq($email,$key)
		{
			$dbh =  $this->db->where("email",$email)
					 		 ->get("poll_users");
		    if($dbh->num_rows()>0)
		    	{
		    		$db=$this->db->where("email",$email)->update("poll_users",array("pass_status"=>0,"pass_link"=>$key));
		    		if($db)
		    			{
		 					if($this->db->affected_rows()>0)
		 						{
		                            return (object)array("email"=>$email,"link"=>site_url("changepassword/".$key."/".$dbh->row()->id));
		 						}
		 					else
		 					    {
		 					    	return (object)array("error"=>"Transaction failed , try again later");
		 					    }
	 					}
	 			 	else
	 			 		{
	 			 			return (object)array("error"=>json_decode($this->db->error()));
	 			 		}
		    	}
		    else
		    	{
		    		return (object)array("error"=>"user not found!!");
		    	}
		}
	public function getCandidates($pos,$year)
		{
		 	$this->db->select("concat(c_othernames,' ',c_surname) as Name,c_id")
		 			 ->where("c_positioncode",$pos)
                     ->order_by("Name","DESC");
             $dbh=$this->db->get("poll_candidates");
		 	if($dbh)
		 		{
		 			return $dbh->result();
		 		}
		 	else
		 		{
		 			var_dump($this->db->error());
		 		}	
		 	
		}
	public function getCounties()
		{
			return $this->db->get("poll_counties")->result();
		}
	public function getYearId($year)
		{
			$dbh = $this->db->where("y_year",$year,FALSE)->get("poll_year");
            return $dbh->row()->y_id;

		}
	public function governorUpdate()
		{
			$year = $this->getYearId($this->input->post("year"));
			$dbh=$this->db->where("county_id",$this->input->post("county"))->where("poll_year_id",$year)->get("governors");
			if($dbh->num_rows()>0)
				{
					$this->db->where("county_id",$year)->update("governors",array("candidate_name"=>$this->input->post("winner"),"party"=>$this->input->post("party"),"party_color"=>$this->input->post("party_color")));
                   if($this->db->affected_rows()>0)
                   		{
                   			return "update successful";
                   		}
				}
			else
			    {
			    	$data=array("candidate_name"=>$this->input->post("winner"),"county_id"=>$this->input->post("county"),"poll_year_id"=>$year,"party"=>$this->input->post("party"),"party_color"=>$this->input->post("party_color"));
			    	$this->db->insert("governors",$data);
			    	 if($this->db->affected_rows()>0)
                   		{
                   			return "insert successful";
                   		}
			    }
		}
	public function getUsers($limit,$start=0)
		{

			return
                $this->db->order_by("Name","ASC")
               			->limit($limit,$start)
               			->get("poll_users")
               			->result();
		}
	public function getCountyInfo($county,$year)
		{
			$dbh=$this->db->where("poll_year_id",$year)
				          ->where("county_id",$county)
				          ->get("governors");
				if($dbh->num_rows()>0)
					{
						return $dbh->row();
					}
		}
}