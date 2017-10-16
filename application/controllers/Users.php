<?php
class Users extends CI_Controller
	{
		protected $data;
		public function __construct()
			{
				parent::__construct();
				$this->load->library("session");
				$this->load->model("home_model","hmodel");
				$this->assist->not_loggedin();
				$this->data["map"]=FALSE;
				$this->data["pagetitle"]="Elections";
				$this->data["pagesubtitle"]="";
			}
		
		public function profile()
			{

			}
		
		public function password()
			{

			}
		public function add()
			{
				#$this->assist->is_admin()||$this->assist->is_supperadmin();
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
	}