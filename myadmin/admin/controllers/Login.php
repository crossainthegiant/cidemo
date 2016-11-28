<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
     $this->load->model('Admin_model');

	}
	 
	 
	public function index()
	{
		$this->load->view('login');
	}

		public function check()
	{
	
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required');

	   if ($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}else{
	     $username=$this->input->post('username');
		 $password=md5($this->input->post('password'));
		 $query=$this->Admin_model->login_user($username,$password);
		 
		if($query){
			$session=array('uid'=>$query['uid'],'username'=>$query['username'],'usertype'=>$query['usertype']);
			$this->session->set_userdata($session);
			redirect('home/index');
		}else{
		echo "用户或密码错误";
		}
		
		}

		
		 //var_dump($query);
	
	}
	
	public function login_out()
	{
		$this->session->sess_destroy();
		redirect('login/index');
	}
	
	
}
