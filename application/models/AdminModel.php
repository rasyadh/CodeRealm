<?php 

class AdminModel extends CI_Model {

    function signin($data) {
        return $this->db->get_where('admin', array('email' => $data['email'], 'password' => $data['password']));
    }

    function getAdmin($email) {
        return $this->db->get_where('admin', array('email' => $email));
    }

    function checkPass($id, $password) {
        return $this->db->get_where('admin', array('id_admin'=>$id, 'password'=>$password));
    }

    function getAllUser() {
        return $this->db->get('user');
    }

    function getAllLecture() {
        return $this->db->get('lecture');
    }
}