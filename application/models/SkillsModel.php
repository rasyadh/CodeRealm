<?php 

class SkillsModel extends CI_Model {

    function skillsList(){
        $skills = $this->db->get('skills');
        return $skills;
    }

    function getSkill($id_skill){
        return $this->db->get_where('skills', array('id_skill'=>$id_skill));
    }
}