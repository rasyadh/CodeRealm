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
}