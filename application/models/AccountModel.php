<?php 

class AccountModel extends CI_Model {

    function checkPass($id, $password) {
        return $this->db->get_where('user', array('id_user'=>$id, 'password'=>$password));
    }
}