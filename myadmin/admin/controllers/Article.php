<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {


	 	public function __construct()
	{
		parent::__construct();
	    $this->load->model(array('Article_model','Categoryes_model'));
		$this->load->helper('text');
	}
	//读取文章列表
	public function index()
	{   
	    $this->load->library('pagination');
	    $config = array(
				'base_url'       => site_url().'/'.$this->uri->segment(1).'/'.$this->uri->segment(2),
				'total_rows'     => $this->db->count_all('articles'),
				'per_page'       => 14,
				'num_links'      => 5,
				'first_link'     => FALSE,
				'last_link'      => FALSE,
				'full_tag_open'  => "<ul class='pagination'>",//关闭标签
				'full_tag_close' => '</ul>',
				'num_tag_open'   => '<li>',	//数字html
				'num_tag_close'  => '</li>',	//当前页html
				'cur_tag_open'   => "<li class='active'><a href='javascript:void(0),'>",
				'cur_tag_close'  => "</a></li>",
				'next_tag_open'  => '<li>',	//上一页下一页html
				'next_tag_close' => '</li>',
				'prev_tag_open'  => '<li>',
				'prev_tag_close' => '</li>',
				'prev_link'      => "<i class='iconfont'>&#xe63e;</i>",
				'next_link'      => "<i class='iconfont'>&#xe63b;</i>"
	   );
	    $this->pagination->initialize($config);
	    $data=array(
				 'article'       => $this->Article_model->get_article($id=FALSE,$config['per_page'],$this->uri->segment(3)),
				 'article_nums'  => $this->db->count_all('articles'),
				 'categoryes'    =>$this->Categoryes_model->get_categoryes()
	          ); 

	   $this->load->view('article_list',$data);

	}
	
	//搜索文章列表
	public function search()
	{   
	    $this->load->library('pagination');
	    $config = array(
				'base_url'       => site_url().'/'.$this->uri->segment(1).'/'.$this->uri->segment(2),
				'total_rows'     => $this->Article_model->search_article_nums($this->input->post('cid'),$this->input->post('title')),
				'per_page'       => 14,
				'num_links'      => 5,
				'first_link'     => FALSE,
				'last_link'      => FALSE,
				'full_tag_open'  => "<ul class='pagination'>",//关闭标签
				'full_tag_close' => '</ul>',
				'num_tag_open'   => '<li>',	//数字html
				'num_tag_close'  => '</li>',	//当前页html
				'cur_tag_open'   => "<li class='active'><a href='javascript:void(0),'>",
				'cur_tag_close'  => "</a></li>",
				'next_tag_open'  => '<li>',	//上一页下一页html
				'next_tag_close' => '</li>',
				'prev_tag_open'  => '<li>',
				'prev_tag_close' => '</li>',
				'prev_link'      => "<i class='iconfont'>&#xe63e;</i>",
				'next_link'      => "<i class='iconfont'>&#xe63b;</i>"
	   );
	    $this->pagination->initialize($config);
		
	    $data=array(
				 'article'       => $this->Article_model->search_article($this->input->post('cid'),$this->input->post('title'),$config['per_page'],$this->uri->segment(3)),
				 'article_nums'  => $this->Article_model->search_article_nums($this->input->post('cid'),$this->input->post('title')),
				 'categoryes'    => $this->Categoryes_model->get_categoryes()
	          ); 

	   $this->load->view('article_list',$data);

	}
	
	/*@创建文字列表并且加载栏目模型加载调用栏目
	*
	*
	*/
	 public function create()
	{
		$data=array(
	         'categoryes'=>$this->Categoryes_model->get_categoryes()
	          );
		$this->load->view('article_create',$data);
	}
	//添加文章
	public function add()
	{

     	$this->form_validation->set_rules('title', '文章标题', 'trim|required',
	  array(
			'required'  => '必须填写文章标题!'
		  )
		);
        $this->form_validation->set_rules('contents', '文章内容', 'required',	
		array(
			'required'  => '必须填写文文章内容!'
		  )
		  );
		
	  if ($this->form_validation->run() == FALSE){
			 $this->formTips(validation_errors(),"article/create",'2');
		} else {

		if($this->input->post('auto')){
			$description = strip_tags(character_limiter($this->input->post('contents'),$this->input->post('auto')));
		} else{
			$description=$this->input->post('description');
		}

		
		$data = array(
		    'cid'         => $this->input->post('cid'),
			'title'       => $this->input->post('title'),
			'description' => $description,
			'contents'    => $this->input->post('contents'),
			'create_date' => date('Y-m-d H:i:s')
		);
	      $query = $this->Article_model->insert($data);
       if($query){
			 $this->formTips('添加成功',"article/index",'2');  
		  }
		  
		  }
	}
	
	//删除文章
	public function delete()
	{
		 $query = $this->Article_model->delete($this->uri->segment(3));
		 if($query){
			 $this->formTips('删除成功!',"article/index",'2');
		 }
		 
	}
	
	//批量删除 移动
		public function batch_operation()
	{
		$cid=$this->input->post('cid');
		$data=$this->input->post('id');
		
		if($this->input->post('submit')){//批量删除
			if(!$data){
		           $this->formTips('没有选择删除项!',"article/index",'2');
	                } else {
		  	          $query = $this->Article_model->deletec($data);
		        if($query){
			          $this->formTips('删除成功!',"article/index",'2');
		             }  
	             }
		}
			if($this->input->post('submit_move')){//批量移动
			          if(!$cid || !$data){
							    $this->formTips('没有选择移动项!',"article/index",'2');
						      }else{
								  $query = $this->Article_model->movec($cid,$data);
								  if($query){
											  $this->formTips('移动成功!',"article/index",'2');
											 }  
								}	
			}

	}
	//图片上传
	


	public function edit()
		{
			
		 $data=array(
	         'article'=>$this->Article_model->get_article($this->uri->segment(3)),
			 'categoryes'=>$this->Categoryes_model->get_categoryes()
	      );
		 $this->load->view('article_edit',$data);
		}
	
	//修改文章
	public function update()
	{

     	$this->form_validation->set_rules('title', '文章标题', 'trim|required',
	  array(
			'required'  => '必须填写文章标题!'
		  )
		);
        $this->form_validation->set_rules('contents', '文章内容', 'required',	
		array(
			'required'  => '必须填写文文章内容!'
		  )
		  );
		
	  if ($this->form_validation->run() == FALSE){
			 $this->formTips(validation_errors(),"article/update/".$this->uri->segment(3),'2');
		} else {
		if($this->input->post('auto')){
			$description = strip_tags(character_limiter($this->input->post('contents'),$this->input->post('auto')));
		} else{
		 $description=$this->input->post('description');
		}
		$data = array(
		    'cid'         => $this->input->post('cid'),
			'title'       => $this->input->post('title'),
			'contents'    => $this->input->post('contents'),
			'description' => $description


		);
	      $query = $this->Article_model->update($data,$this->uri->segment(3));
       if($query){
			 $this->formTips('修改成功',"article/index",'2');  
		  } else {
			 $this->formTips('没有任何更改',"article/index",'2');  
		  }
		  
		  }
	}
}
