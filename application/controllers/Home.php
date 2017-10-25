<?php
class Home extends CI_Controller
	{
		public $data;
		public function __construct()
			{
				parent::__construct();
				$this->load->library("session");
				$this->load->model("home_model","hmodel");
				$this->assist->not_loggedin();
				$this->data["map"]=FALSE;
				$this->check_pass();
				$this->data["county"]=$this->hmodel->getCounties();
				$this->data["pagetitle"]="Elections";
				$this->data["pagesubtitle"]="";
				$this->data["msg"]=NULL;
			}
		public function dashboard()
			{
				$this->data["pagesubtitle"]="Dashboard";
				$this->data["map"]="modules/mapdraw";
				$this->data["view"]="dashboard";
				$this->load->view("structure",$this->data);
			}
		public function check_pass()
			{
				if($this->session->userdata("password")==0)
					{
						redirect("managepassword","refresh");
					}
			}
		public function governors($year)
			{
				$this->data["pagesubtitle"]="Gubernatorial";
				$this->data["view"]="gubernatorial";
           		if($this->input->post())
           		  	{
           		  		$this->hmodel->governorUpdate();
           		  	}
                $this->load->view("structure",$this->data);
			}
		public function president($year)
			{
			   	if($this->input->post())
			   		{
			   			$data=$this->hmodel->presidentialResults();
			   			if(isset($data->error))
			   				{
			   					$this->data["msg"]="<div class='alert alert-danger'>".$data->error."</div>";
			   				}
			   			else
			   				{
			   					$this->data["msg"]="<div class='alert alert-default'>".$data->msg."</div>";
			   				}
			   		}
			   $this->data["pagesubtitle"]="Presidential";
               $this->data["candidates"]=$this->hmodel->getCandidates(1,$year);
               $this->data["view"]="presidential";
               $this->load->view("structure",$this->data);
			}
		public function getGovernor($county,$year)
			{
				$dbh=$this->db->join("poll_year","poll_year.y_id=governors.poll_year_id")
				          ->where("y_year",$year)
				          ->where("county_id",$county)
				          ->get("governors");
				if($dbh->num_rows()>0)
					{
						echo $dbh->row()->candidate_name;
					}
			}
		public function getCountyInfo($county,$year)
			{
				$dt=$this->hmodel->getCountyInfo($county,$year);
				$this->output->set_content_type('application/json')
				             ->set_output(json_encode($dt));
			}
		public function getGovernorDatalist($county,$year)
			{
				switch($year)
					{               
						case 2013:
 								    $this->db->select("candidate_name as name")
 								             ->where("position_id",2)
 								             ->where("county_id",$county)
 								             ->group_by("candidate_id");
 								    $dbh=$this->db->get("election_results")->result();
                                    break;
						case 2017:
						            $this->db->select("concat(c_othernames,' ',c_surname) as name")
                                         ->where("c_positioncode",2)
                                         ->where("c_countycode",$county)
                                         
                                            ;
                                	$dbh=$this->db->get("poll_candidates")->result();
		 					   

									break;
					}
				
			    foreach($dbh as $value)
			     	{
			     		echo "<option>".$value->name."</option>";
			     	}
			}
		public function getConstituency($county)
			{
                $dbh=$this->db->where("county_id",$county)->get("poll_constituencies")->result();
                echo "<option>Select Constituency</option>";
                foreach($dbh as $value)
                	{
                		echo "<option value='".$value->constituency_id."'>".$value->constituency_name."</option>";
                	}
			}
		public function presidential($constid,$year)
			{
				$candidates=$this->hmodel->getCandidates(1,$year);
               	foreach($candidates as $candidate)
				{
					$votes=$this->hmodel->getRes($candidate->c_candidateid,$constid,$year);
				
					echo'
					<div class="form-group">
						<label for="votes'.$candidate->Name.'" class="control-label col-md-4">'.$candidate->Name.'</label>
						<div class="col-md-8">
							<input type="text" id="votes'.$candidate->Name.'" class="form-control" name="votes['.$candidate->c_candidateid.']" required autofocus pattern="[0-9]+$" autocomplete="FALSE" value="'.@$votes.'">
						</div>
					</div>';
				}
			}
	}