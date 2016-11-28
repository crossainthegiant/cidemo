<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {


    public function __construct()
    {
       
        parent::__construct();
		
    }

	public function get_setting(){
		
	   $query=$this->db->get('setting');
		return $query->row_array();
		
	}
		public function update($data)
		{
		$this->db->where('siteid',1);
		$this->db->update('setting',$data);
		return $this->db->affected_rows();
		}

	
}