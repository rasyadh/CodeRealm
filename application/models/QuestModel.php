<?php 

class QuestModel extends CI_Model {

    function getQuest($id_quest) {
        return $this->db->get_where('course', array('id'=>$id_quest));
    }

    function getLectureQuest($id_lecture) {
        return $this->db->get_where('course', array('id_lecture'=>$id_lecture));
    }

    function getAllQuest() {
        return $this->db->get('course');
    }

    function getQuestPath($id_quest) {
        return $this->db->get_where('course_detail', array('id'=>$id_quest));
    }

    function getAllCourse($id_quest_path) {
        return $this->db->get_where('course_detail', array('id_course'=>$id_quest_path));
    }

    function getNumOfCourse() {
        $select = array(
            'course.id',
            'count(course_detail.id_course) as NumOfCourse'
        );
        $result = $this->db
                        ->select($select)
                        ->from('course, course_detail')
                        ->where('course.id = course_detail.id_course')
                        ->group_by('course.id')
                        ->get()
                        ->result_array();

        $numOfCourse = array();
        foreach ($result as $num) {
            $numOfCourse[$num['id']] = $num['NumOfCourse'];
        }

        return $numOfCourse;
    }

    function getMainPage() {
        $quests =  $this->getAllQuest()->result();
        $numOfCourse = $this->getNumOfCourse();

        $data = array();
        foreach ($quests as $quest) {
            $row = array(
                'id' => $quest->id,
                'name' => $quest->nama_course,
                'lecture' => $quest->id_lecture,
                'numOfCourse' => $numOfCourse[$quest->id],
                'description' => $quest->keterangan,
                'status' => $quest->status,
                'enrollUrl' => $quest->enroll_url,
                'img' => $quest->img
            );
            array_push($data, $row);
            $row = array();
        }

        return json_encode($data);
    }

    function getQuestContent($url) {
        $quest = $this->db->get_where('course', array('enroll_url'=>$url))->row_array();
        $numOfCourse = $this->getNumOfCourse();
        $course = $this->db->get_where('course_detail', array('id_course'=>$quest['id']))->result();

        $lecture = $this->db->get_where('lecture', array('id_lecture'=>$quest['id_lecture']))->row_array();

        $data = array();
        $data_course = array();
        foreach ($course as $c) {
            $row = array(
                'nameCourse' => $c->nama_detail,
                'description' => $c->keterangan,
                'img' => $c->img,
                'point' => $c->point,
                'status' => $c->status
            );
            array_push($data_course, $row);
            $row = array();
        }

        $data_quest = array(
            'name' => $quest['nama_course'],
            'description' => $quest['keterangan'],
            'enrollUrl' => $quest['enroll_url'],
            'img' => $quest['img'],
            'numOfCourse' => $numOfCourse[$quest['id']],
            'lecture' => $lecture['name'],
            'lecturePhoto' => $lecture['photo_url'],
            'courses' => $data_course
        );
        array_push($data, $data_quest);

        return json_encode($data);
    }
}