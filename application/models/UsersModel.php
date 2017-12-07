<?php 

class UsersModel extends CI_Model {

    function signin($data) {
        return $this->db->get_where('user', array('email' => $data['email'], 'password' => $data['password']));
    }

    function getUser($email) {
        return $this->db->get_where('user', array('email' => $email));
    }

    function checkPass($id, $password) {
        return $this->db->get_where('user', array('id_user'=>$id, 'password'=>$password));
    }

    public function signup($data) {
        $check_email =  $this->db->get_where('user', array('email'=>$data['email']))->result();

        if ($check_email) {
            return false;
        }
        else {
            $check_username = $this->db->get_where('user', array('username'=>$data['username']))->result();

            if ($check_username) {
                return false;
            }
            else {
                $this->db->insert('user', $data);
                if ($this->db->affected_rows() > 0) {
                    return true;
                }
            }
        }
    }

}