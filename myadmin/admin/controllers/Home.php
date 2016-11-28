<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	 	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
	//加载日历类库
	$this->load->library('calendar');
	$this->load->view('home');
	}
	

}
