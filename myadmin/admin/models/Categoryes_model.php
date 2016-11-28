<?php
class Categoryes_model extends CI_Model {


    public function __construct()
    {
       
        parent::__construct();
		
    }
	
	//添加栏目
	public function insert($data){
		$this->db->insert('categoryes',$data);
		return $this->db->affected_rows();
	}
	//获取栏目
	public function get_categoryes($cid = FALSE)
	{
		if($cid==FALSE){
		$query=$this->db->get('categoryes');
		return $query->result_array();
		}else{
		$query=$this->db->get_where('categoryes',array('cid'=> $cid) );
		return $query->row_array();
		}
	}
		//获取栏目并统计当前栏目文章数量
		
		public function get_categoryes_nums()
	{
		
		$query=$this->db->count_all_results('article');
		return $query->result_array();
		
	}	
	
	public function delete($cid)
	{
		$this->db->delete('categoryes', array('cid' => $cid));  
		return $this->db->affected_rows();
	}
	
		public function update($data,$cid)
	{
		$this->db->where('cid',$cid);
		$this->db->update('categoryes',$data);
		return $this->db->affected_rows();
	}
	
}