<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	  public function __construct()
    {
        parent::__construct();
	 	if(!$this->checkSession()){
			exit();
		};
    }
	
	protected function checkSession(){
		if($this->session->uid)
		{
			return true;			//echo '已经登录';
		}
		else
		{
			echo "非法登录!";			//redirect('login');
			return false;
		}
	}
	protected  function formTips($tips="",$url="/",$refreshTime="1"){

		$data = array(
		        'Tips'=> $tips,
		        'url'=> $url,
		        'refreshTime'=> $refreshTime
		    );
		$this->load->view('formTips',$data);
	}
	 

}
