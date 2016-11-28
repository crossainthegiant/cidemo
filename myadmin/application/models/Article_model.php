<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
		
    }
	
	//添加文章
 	public function insert($data){
		$this->db->insert('articles',$data);
		return $this->db->affected_rows();
	} 
	/*获取文章
	*并用left关联articles
	*
	*/
	
	public function get_article($id = FALSE,$num = FALSE, $offset = FALSE)
	{
		if($id){
		$query=$this->db->get_where('articles',array('id'=> $id) );
		return $query->row_array();
		}else{
        $this->db->join('categoryes', 'categoryes.cid = articles.cid','left');	
		$query=$this->db->get('articles',$num, $offset);
		return $query->result_array();
		}
	}
 	
	public function delete($id)
	{
		$this->db->delete('articles', array('id' => $id));  
		return $this->db->affected_rows();
	}
		public function deletec($data)
	{
		$this->db->where_in('id',$data);
		$this->db->delete('articles');  
		return $this->db->affected_rows();
	}
			public function movec($cid,$data)
	{
		$this->db->where_in('id',$data);
		$this->db->update('articles',array('cid'=>$cid));  
		return $this->db->affected_rows();
	}
	
	
   public function update($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('articles',$data);
		return $this->db->affected_rows();
	} 
	
}