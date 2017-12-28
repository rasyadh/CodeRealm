<?php 

class AccountModel extends CI_Model {

    function checkPass($id, $password) {
        return $this->db->get_where('user', array('id_user'=>$id, 'password'=>$password));
    }

    function getKeepPlayingSkills($id_user) {
        $enroll = $this->db->get_where('enroll_skills', array('id_user'=>$id_user))->result();

        $data = array();
        foreach ($enroll as $e) {
            $skill = $this->db->get_where('skills', array('id_skill'=>$e->id_skill))->result();
            $row = array(
                'id_user' => $e->id_user,
                'id_skill' => $e->id_skill,
                'enroll_status' => $e->enroll_status,
                'skill_name' => $skill[0]->skill_name,
                'skill_badge' => $skill[0]->skill_badge,
                'enroll_url' => $skill[0]->enroll_url
            );
            array_push($data, $row);
            $row = array();
        }

        return json_encode($data);
    }

    function getKeepPlayingQuest($id_user) {
        $enroll = $this->db->get_where('enroll_course', array('id_user'=>$id_user))->result();

        $data = array();
        foreach ($enroll as $e) {
            $course = $this->db->get_where('course', array('id'=>$e->id_course))->result();
            $row = array(
                'id_user' => $e->id_user,
                'id_course' => $e->id_course,
                'enroll_status' => $e->enroll_status,
                'name' => $course[0]->nama_course,
                'img' => $course[0]->img,
                'enroll_url' => $course[0]->enroll_url
            );
            array_push($data, $row);
            $row = array();
        }

        return json_encode($data);
    }

    function getBadges($id_user) {
        $result = $this->db->get_where('badgenuser', array('id_user'=>$id_user))->result();
        $data = array();
        foreach ($result as $r) {
            $badges = $this->db->get_where('badge', array('id'=>$r->id_badge))->result();
            $row = array(
                'id_badge' => $r->id_badge,
                'img' => $badges[0]->img,
                'nama_badge' => $badges[0]->nama_badge
            );
            array_push($data, $row);
            $row = array();
        }
        
        return json_encode($data);
    }
}