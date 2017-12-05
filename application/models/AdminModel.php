<?php 

class AdminModel extends CI_Model {

    function signin($data){
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return true;
        } 
        else {
            return false;
        }
    }

    function read_admin_info($email){
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
}