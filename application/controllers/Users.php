<?php
class Users extends CI_Controller
	{
		protected $data;
		public function __construct()
			{
				parent::__construct();
				$this->load->library("session");
				$this->load->helper("string");
				$this->load->model("home_model","hmodel");
				$this->assist->not_loggedin();
				$this->data["map"]=FALSE;
				$this->data["pagetitle"]="Elections";
				$this->data["pagesubtitle"]="";

			}
		
		public function profile()
			{
				$this->data["pagesubtitle"]="Account";
                $this->data["view"]="profile";
				$this->load->view("structure",$this->data);
			}
		
		public function password()
			{
				if($this->input->post())
					{
						$add=$this->hmodel->changePassword();
						if(isset($add->error))
                           	{
                           		$this->data["msg"]=$add->error;
                           	}
                        else
                        	{
                        		$this->data["msg"]=$add->msg;
                        		$this->session->set_userdata('password',1);
                        		redirect("home");
                        	}
					}
				$this->data["pagesubtitle"]="Account";
                $this->data["view"]="changepasswd";
				$this->load->view("structure",$this->data);
			}
		public function add()
			{
				#$this->assist->is_admin()||$this->assist->is_supperadmin();
				if($this->input->post())
					{
						$add=$this->hmodel->addUser();
						if(isset($add->error))
                           	{
                           		$this->data["msg"]=$add->error;
                           	}
                        else
                        	{
                        		$this->data["msg"]=$add->msg;
                        	}
					}
				$this->data["pagesubtitle"]="Admin";
                $this->data["view"]="add_user";
				$this->load->view("structure",$this->data);
			}
		public function manage()
			{
				#$this->assist->is_admin()||$this->assist->is_supperadmin();
				$this->data["table"]=$this->hmodel->getUsers(10);
				$this->data["pagesubtitle"]="Admin";
                $this->data["view"]="manage_users";
				$this->load->view("structure",$this->data);
			}
		public function getUsers($userid)
			{
               	$data=$this->hmodel->user($userid);
               	$this->output->set_content_type('application/json')
				             ->set_output(json_encode($data));
			}
		public function changePass()
			{
				//var_dump($_POST);
				$authkey=random_string('alpha',12);
				$pass=$authkey.str_replace("'", "",$_POST["pass"]);
				echo $pass;
				$data=array(
					          "auth_key"=>$authkey,
					          "password"=>hash("MD5",$pass),
					          "pass_status"=>0
				            );
				$this->output->set_output($this->hmodel->adminPassC($data));
			}
	}