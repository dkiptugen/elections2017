<?php
class Login extends CI_Controller
    {
        protected $data;
        public function __construct()
            {
                parent::__construct();
                $this->load->model("home_model","hmodel");
                $this->load->library("session");
                
                $this->load->helper("string");
            }
        public function index()
            {
                $this->assist->is_loggedin();
                $this->data["msg"]="";
                if($this->input->post())
                    {
                       $data=$this->hmodel->login($this->input->post("username"),$this->input->post("password"));
                        if(isset($data->error))
                            {
                                $this->data["msg"]='<small class="alert alert-danger alert-block text text-bold" style="width:100% !important;">'.$data->error.'</small>';
                            }
                        elseif($data->user_status==0)
                            {
                                $this->data["msg"]='<small class="alert alert-warning alert-block text text-bold" style="width:100% !important;">Account inactivated, Contact Administrator</small>';
                            }
                        else
                            {
                                $newdata = array(
                                                        'id'  => $data->id,
                                                        'name'  => $data->Name,
                                                        'username'  => $data->username,
                                                        'email'     => $data->email,
                                                        'role'     => $data->role,
                                                        'password' =>$data->pass_status,
                                                        'election_login' => TRUE
                                                );
                                $this->session->set_userdata($newdata);
                                redirect("home","refresh");
                            }
                    }
                $this->data["view"]="login";
                $this->load->view("login/structure",$this->data);
            }
        
        public function changepassword($data=NULL,$userid=NULL)
            {
                $this->data["msg"]="";
                if($data==NULL)
                    {
                        $key=random_string('alpha',50);
                        $this->data["view"]="changepassrq";
                        if($this->input->post())
                            {
                                $passrq=$this->hmodel->changepassrq($this->input->post("email"),$key);
                                $this->data["msg"]=$passrq;
                                if(!isset($passrq->error))
                                    {
                                        $this->data["msg"]="Password has been sent to".$this->input->post("email");
                                    }
                                else
                                    {
                                        $this->data["msg"]=$passrq->error;
                                    }
                            }
                    }
                else
                    {
                        $this->data["view"]="changepassword";
                    }
                $this->load->view("login/structure",$this->data);
            }
        public function register()
            {
                $this->data["view"]="register";
                $this->load->view("login/structure",$this->data);
            }
        public function logout()
            {
                
              $array_items = array('id','image','name','username','email','role','password','election_login');
              $this->session->unset_userdata($array_items);
              $this->session->sess_destroy();
              $this->cache->clean();
              redirect("login","refresh");
            }
    }