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
	public function addUser()
		{
			$authkey=random_string('alpha',12);
			if($this->db->where("username",$this->input->post("username"))->get("poll_users")->num_rows()>0)
			  	{
			  		return (object)array("error"=>"Username ".$this->input->post("username"). " already exists");
			  	}
			else
				{
					$data=array("Name"=>$this->input->post("fullname"),"username"=>$this->input->post("username"),"email"=>$this->input->post("email"),"password"=>hash("MD5",$authkey.$this->input->post("pass1")),"role"=>$this->input->post("role"),"user_status"=>1,"pass_status"=>0,"auth_key"=>$authkey);
					$this->db->insert("poll_users",$data);
					if($this->db->affected_rows()>0)
						{
							return (object)array("msg"=>"Data inserted successfully");
						}
		            else 
		            	{
		            		return (object)array("error"=>$this->db->error());
		            	}
	            }
		}
	public function changePassword() 
		{
			$check=$this->db->where("id",$this->session->userdata("id"))
							->where("password","md5(concat(`auth_key`,'".$this->input->post("rpass")."'))",FALSE)
							->get("poll_users");
			//return (object)array("error"=>$check->get_compiled_select("poll_users"));
			if($check->num_rows()>0)
				{
					$authkey=random_string('alpha',12);
					$data=array(
									"password"=>hash("MD5",$authkey.$this->input->post("pass1")),
									"auth_key"=>$authkey,
									"pass_status"=>1
								);
					$this->db->where("id",$this->session->userdata("id"))
							 ->update("poll_users",$data);
				    if($this->db->affected_rows()>0)
				       {
				       		return (object)array("msg"=>"password changed");
				       }
				    else 
		            	{
		            		return (object)array("error"=>$this->db->error());
		            	}
				}
			else 
            	{
            		return (object)array("error"=>"Wrong password, try again");
            	}
		}
}