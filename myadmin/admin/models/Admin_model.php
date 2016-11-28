<?php

class Admin_model extends CI_Model
{


    public function __construct()
    {

        parent::__construct();

    }

    public function login_user($username, $password)

    {
        $query = $this->db->get_where('admin', array('username' => $username, 'password' => $password));
        return $query->row_array();
    }

    public function get_user()
    {

        $query = $this->db->get('admin');
        return $query->row_array();

    }

    public function update($data)
    {
        $this->db->where('uid', 1);
        $this->db->update('admin', $data);
        return $this->db->affected_rows();
    }


}