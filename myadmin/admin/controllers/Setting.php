<?php
class Setting extends MY_Controller {


	 	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model');

	}
	public function index()
	{
	$data = array(
	         'setting' => $this->Setting_model->get_setting()
	   );
	
	$this->load->view('setting',$data);
	}
	
	public function site_update()
	{
		  $this->form_validation->set_rules('sitename', '站点名称', 'trim|required',
	      array(
			'required'  => '必须填写站点名称!'
		  )
	     	);
		  $this->form_validation->set_rules('siteurl', '站点地址', 'trim|required',
	      array(
			'required'  => '必须填写站点地址!'
		  )
	     	);
		  $this->form_validation->set_rules('keywords', 'SEO关键词', 'trim|required',
	      array(
			'required'  => '必须填写SEO关键词!'
		  )
	     	);
		  $this->form_validation->set_rules('description', 'SEO描述', 'trim|required',
	      array(
			'required'  => '必须填写SEO描述!'
		  )
	     	);			
		
		if ($this->form_validation->run() == FALSE){
			 $this->formTips(validation_errors(),"setting/index",'2');
		} else {
			
		$data = array(
		    'sitename'    => $this->input->post('sitename'),
			'siteurl'    => $this->input->post('siteurl'),
			'keywords'	  => $this->input->post('keywords'),
			'description' => $this->input->post('description'),
			

		);
	      $query = $this->Setting_model->update($data);
          if(!$query){
			  $this->formTips('没有任何更改',"setting/index",'2');  
		        }else{
			  $this->formTips('修改成功',"setting/index",'2');  
		  }
		}
		

	} 

	
	
	
	
}
