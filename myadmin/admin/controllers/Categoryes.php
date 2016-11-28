<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoryes extends MY_Controller {


	 	public function __construct()
	{
		parent::__construct();
	    $this->load->model('Categoryes_model');

	}
	public function index()
	{
	   $data=array(
	         'categoryes'=>$this->Categoryes_model->get_categoryes()
	          );
	   $this->load->view('categoryes_list',$data);
	}
	
	public function create()
	{
		$this->load->view('categoryes_create');
	}
	
	public function add()
	{
     	$this->form_validation->set_rules('cname', '栏目名称', 'trim|required|max_length[12]',
	  array(
			'required'  => '必须填写栏目名称!',
			'max_length' => '栏目名称不能超过12个字符!'
		  )
		);
        $this->form_validation->set_rules('order', '排序', 'trim|integer');
		
	  if ($this->form_validation->run() == FALSE){
			 $this->formTips(validation_errors(),"categoryes/create",'2');
		} else {
		$data = array(
			'cname' => $this->input->post('cname'),
			'order' => $this->input->post('order')
		);
	      $query = $this->Categoryes_model->insert($data);
       if($query){
			 $this->formTips('添加成功',"categoryes",'2');  
		  }
		  
		  }
	}
	
	public function delete()
	{
		 $query = $this->Categoryes_model->delete($this->uri->segment(3));
		 if($query){
			 $this->formTips('删除成功!',"categoryes/index",'2');
		 }
		 
	}
	
	public function edit()
		{
		 $data=array(
	         'categoryes'=>$this->Categoryes_model->get_categoryes($this->uri->segment(3))
	      );
		 $this->load->view('categoryes_edit',$data);
		}
	
		public function update()
	{
     	$this->form_validation->set_rules('cname', '栏目名称', 'trim|required|max_length[12]',
	     array(
			'required'  => '必须填写栏目名称!',
			'max_length' => '栏目名称不能超过12个字符!'
		  )
		);
        $this->form_validation->set_rules('order', '排序', 'trim|integer');
		
	  if($this->form_validation->run() == FALSE){
			 $this->formTips(validation_errors(),"categoryes/edit/".$this->uri->segment(3),'2');
		} else {
		$data = array(
			'cname' => $this->input->post('cname'),
			'order' => $this->input->post('order')
		);
	      $query = $this->Categoryes_model->update($data,$this->uri->segment(3));
		  if($query){
			 $this->formTips('修改成功',"categoryes",'2');  
		  }

		  }
	}
}
