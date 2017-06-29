<?php
class Elections extends CI_Controller{
   	public $data;
	public function __construct()
		{
			parent::__construct();
            $this->data['title']='Elections 2017';
		}

	public function login()
		{   
			$this->load->model('account_model','account');
			$this->data['msg']='';
			if($this->input->post())
				{
					$login=$this->account->login();
					if(isset($login->error))
					   {
					   		$this->data['msg']=$login->error;
					   }
					else
						{
							$login->logged_in=TRUE;
							$this->session->set_userdata((array)$login);
							
						}
					
				}
		    $this->assist->isLoggedIn();
			$this->data['title']='Elections 2017 | Login';
			$this->load->view('modules/login',$this->data);
		}
	public function changepassword()
		{	
			$this->load->model('account_model','account');
			$this->data['msg']='';
			if($this->input->post())
				{
					$this->data['msg']=json_encode($this->input->post());
				}
			$this->data['title']='Elections 2017 | Change Password';
			$this->load->view('modules/change_password',$this->data);
		}
    public function images($type)
    	{
    		$this->output->set_content_type('image/png')
    	                 ->set_output(file_get_contents($this->assist->avatar('user')));
    	}
    public function logout()
		{
		    $user_data = $this->session->all_userdata();
		        foreach ($user_data as $key => $value) {
		           // if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
		                $this->session->unset_userdata($key);
		            //}
		        }
		    $this->session->sess_destroy();
		    redirect('elections/login','refresh');
		}
}
?>