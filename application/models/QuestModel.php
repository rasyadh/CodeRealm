<?php 

class QuestModel extends CI_Model {

    function getQuest($id_quest) {
        return $this->db->get_where('quest', array('id_quest'=>$id_quest));
    }

    function getLectureQuest($id_lecture) {
        return $this->db->get_where('quest', array('id_lecture'=>$id_lecture));
    }

    function getAllQuest() {
        return $this->db->get('quest');
    }

    function getAllCourse($id_skill_path) {
        return $this->db->get_where('skill_course', array('id_skill_path'=>$id_skill_path));
    }

    function getCourse($id_skill_course) {
        return $this->db->get_where('skill_course', array('id_skill_course'=>$id_skill_course));
    }

    function getNumOfCourse() {
        $select = array(
            'skills.id_skill',
            'count(skill_course.id_skill_course) as NumOfCourse'
        );
        $result = $this->db
                        ->select($select)
                        ->from('skills, skill_path, skill_course')
                        ->where('skills.id_skill = skill_path.id_skill and skill_path.id_skill_path = skill_course.id_skill_path')
                        ->group_by('skills.id_skill')
                        ->get()
                        ->result_array();

        $numOfCourse = array();
        foreach ($result as $num) {
            $numOfCourse[$num['id_skill']] = $num['NumOfCourse'];
        }

        return $numOfCourse;
    }

    function getMainPage() {
        $skills =  $this->getAllSkill()->result();
        $numOfCourse = $this->getNumOfCourse();

        $data = array();
        foreach ($skills as $skill) {
            $row = array(
                'id' => $skill->id_skill,
                'name' => $skill->skill_name,
                'numOfCourse' => $numOfCourse[$skill->id_skill],
                'description' => $skill->description,
                'enrollUrl' => $skill->enroll_url,
                'skillBadge' => $skill->skill_badge
            );
            array_push($data, $row);
            $row = array();
        }

        return json_encode($data);
    }

    function getSkillContent($url) {
        $skill = $this->db->get_where('skills', array('enroll_url'=>$url))->row_array();
        $numOfCourse = $this->getNumOfCourse();
        $path = $this->db->get_where('skill_path', array('id_skill'=>$skill['id_skill']))->result();
        $course = $this->db->get_where('skill_course', array('id_skill_path'=>$path[0]->id_skill_path))->result();

        $data = array();
        $data_course = array();
        $data_path = array();
        foreach ($path as $p) {
            foreach ($course as $c) {
                $row = array(
                    'courseName' => $c->name_course,
                    'description' => $c->description,
                    'courseUrl' => $c->skill_course_url,
                    'courseBadge' => $c->skill_course_badge
                );
                array_push($data_course, $row);
                $row = array();
            }
            $rowp = array(
                'titlePath' => $p->title_path,
                'description' => $p->description,
                'courses' => $data_course
            );
            array_push($data_path, $rowp);
            $rowp = array();
            $data_course = array();
        }

        $data_skill = array(
            'name' => $skill['skill_name'],
            'description' => $skill['description'],
            'enrollUrl' => $skill['enroll_url'],
            'skillBadge' => $skill['skill_badge'],
            'numOfCourse' => $numOfCourse[$skill['id_skill']],
            'path' => $data_path
        );
        array_push($data, $data_skill);

        return json_encode($data);
    }
}