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

    function getDashboard() {
        $select = array(
            'count(user.id_user) as numUser'
        );
        $user = $this->db
                        ->select($select)
                        ->from('user')
                        ->get()
                        ->row_array();

        $select = array(
            'count(skills.id_skill) as numSkill'
        );
        $skill = $this->db
                        ->select($select)
                        ->from('skills')
                        ->get()
                        ->row_array();

        $select = array(
            'count(course.id) as numQuest'
        );
        $quest = $this->db
                        ->select($select)
                        ->from('course')
                        ->get()
                        ->row_array();

        $select = array(
            'count(lecture.id_lecture) as numLecture'
        );
        $lecture = $this->db
                        ->select($select)
                        ->from('lecture')
                        ->get()
                        ->row_array();

        $result = [$user, $skill, $quest, $lecture];
        return $result;
    }
}