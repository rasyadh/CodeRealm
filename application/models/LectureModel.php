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

    function getAllCourseUser() {
        $this->db->select('e.id, c.nama_course, u.name, u.email');
        $this->db->from('enroll_course e'); 
        $this->db->join('course c', 'c.id=e.id_course', 'inner');
        $this->db->join('user u', 'u.id_user=e.id_user', 'inner');
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query;
        }
        else
        {
            return false;
        }
    }

    function delete($id){
        $this->db->delete('enroll_course', array('id' => $id));
    }

}