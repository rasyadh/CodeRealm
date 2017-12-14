<?php 

class LectureModel extends CI_Model {

    function signin($data) {
        return $this->db->get_where('lecture', array('email' => $data['email'], 'password' => $data['password']));
    }

    function getLecture($email) {
        return $this->db->get_where('lecture', array('email' => $email));
    }

    function checkPass($id, $password) {
        return $this->db->get_where('lecture', array('id_lecture'=>$id, 'password'=>$password));
    }

    function getAllUser() {
        return $this->db->get('user');
    }
}