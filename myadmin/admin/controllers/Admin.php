<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {


	 	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');

	}
	public function index()
	{
	$data = array(
	         'user' => $this->Admin_model->get_user()
	             );
	
	$this->load->view('admin',$data);
	}
	
	public function update_user_info()
	{
		  $this->form_validation->set_rules('email', '文章标题', 'trim|required|valid_email',
	  array(
			'required'  => '必须填写邮箱!',
			'valid_email'  => '邮箱格式不正确!'
		  )
		);
        $this->form_validation->set_rules('qq', '文章内容', 'trim|required',	
		array(
			'required'  => '必须填写联系QQ!'
		  )
		  );
	$this->form_validation->set_rules('tel', '文章内容', 'trim|required',	
		array(
			'required'     => '必须填写联系电话!',
		
		  )
		  );
		
		if ($this->form_validation->run() == FALSE){
			 $this->formTips(validation_errors(),"admin/index",'2');
		} else {
			
		$data = array(
		    'email'   => $this->input->post('email'),
			'qq'      => $this->input->post('qq'),
			'tel'	  => $this->input->post('tel')

		);
	      $query = $this->Admin_model->update($data);
          if(!$query){
			  $this->formTips('没有任何更改',"admin/index",'2');  
		        }else{
			  $this->formTips('添加成功',"admin/index",'2');  
		  }
		}
		

	}
	//修改管理密码
		public function password_admin()
	{
		$this->load->view('update_admin_password');
	}
	
		//修改管理密码验证提交
	    public function update_pwd()
	{     
	    $this->form_validation->set_rules('prior_password', '旧密码', 'trim|required',
	    array(
			'required'  => '必须填写旧密码!'
		     )                           );
        $this->form_validation->set_rules('news_password', '新密码', 'trim|required',	
		array(
			'required'  => '必须填写新密码!'
		     )
		  );
	    $this->form_validation->set_rules('news_password_again', '再次新密码', 'trim|required|matches[news_password]',	
		array(
			'required'  => '必须再次填写新密码!',
			'matches'  => '两次新密码输入不一致!'
		    )
		  );
		if ($this->form_validation->run() == FALSE)
		{
			 $this->formTips(validation_errors(),"admin/password_admin",'2');
		} else {
					$user     = $this->Admin_model->get_user();
					$password = md5($this->input->post('prior_password'));
					if($user['password'] !== $password)
						{
								$this->formTips('旧密码不正确',"admin/password_admin",'2');  
						}else{
								$data = array(
								  'password'   => md5($this->input->post('news_password'))
								              );
								      $query = $this->Admin_model->update($data);
								if(!$query){
								      $this->formTips('密码修改失败',"admin/password_admin",'2');  
								}else{
								       $this->formTips('密码修改成功',"admin/index",'2');  
								      }
					         }
		        }
		
	}
	
	
	
}
