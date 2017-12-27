<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('questmodel');
        
    }

	public function index() {
        if (isset($this->session->userdata['lecture_signed_in'])) {
            $id = $this->session->userdata['lecture_signed_in']['id'];
        }
        $data['title'] = "Quest Course";
        $data['data_quest'] = $this->questmodel->getLectureQuest($id)->result();

		$this->template->load('base_lecture', 'lecture/quest/quest', $data);
    }

    public function add_quest() {
        if (isset($_POST['add_quest'])) {
            // $config['upload_path'] = 'assets/image/Badge/';
            // $config['allowed_types'] = 'png|jpg ';
            // $config['max_size'] = '1000';
            // $this->load->library('upload', $config);

            // $data_quest = array();
            // if ($this->upload->do_upload('img')) {
            //     $upload_data = $this->upload->data();
                
            //     $data_quest['nama_course'] = $this->input->post('nama_course');
            //     $data_quest['keterangan'] = $this->input->post('keterangan');
            //     $data_quest['img'] = site_url().$config['upload_path'].$upload_data['file_name'];
            //     $data_quest['status'] = $this->input->post('status');

            //     $this->db->insert('course', $data_quest);
            // }
            $data_quest['nama_course'] = $this->input->post('name');
            $data_quest['keterangan'] = $this->input->post('description');
            $data_quest['img'] = $this->input->post('url');
            $data_quest['status'] = $this->input->post('status');
            $data_quest['id_lecture']  = $this->session->userdata['lecture_signed_in']['id'];
            $data_quest['enroll_url'] = $this->input->post('enroll_url');

            $this->db->insert('course', $data_quest);

            redirect('lecture/quest');
        }
        else {
            redirect('lecture/quest');
        }
    }

     public function path() {
        $id_quest = $this->uri->segment(4);

        $data['title'] = "Quest Path";
        $data['course_detail'] = $this->questmodel->getQuest($id_quest)->row_array();
        $data['data_path'] = $this->questmodel->getAllCourse($id_quest)->result();

        
        $this->template->load('base_lecture', 'lecture/quest/path', $data);
    }

    public function edit_quest() {
        $id_quest = $this->uri->segment(4);
        $data['title'] = "Edit Quest";
        $data['quest'] = $this->questmodel->getQuest($id_quest)->row_array();
        $data['status'] = $data['quest']['status'];

        $this->template->load('base_lecture', 'lecture/quest/edit_quest', $data);
    }
    
    public function save_edit_quest() {
        if (isset($_POST['save_edit'])) {
            $id = $this->input->post('id');
            $data_quest = array(
                'nama_course' => $this->input->post('nama_course'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => $this->input->post('status')
            );
    
            $this->db->where('id', $id);
            $this->db->update('course', $data_quest);
            redirect('lecture/quest');
        }
        else {
            redirect('lecture/quest');
        }
    }

    public function delete_quest() {
        $id_quest = $this->uri->segment(4);
        
        $this->db->delete('course', array('id' => $id_quest));

        redirect('lecture/quest');
    }

     public function add_path() {
        if (isset($_POST['add_path'])) {
            $id = $this->input->post('id_course');

            $data_path = array(
                'id_course' => $this->input->post('id_course'),
                'nama_detail' => $this->input->post('nama_detail'),
                'keterangan' => $this->input->post('keterangan'),
                'point' => $this->input->post('point'),
                'img' => $this->input->post('img'),
                'status' => $this->input->post('status')
            );
            
            $this->db->insert('course_detail', $data_path);

            redirect('lecture/quest/path/'.$id);
        }
        else {
            redirect('lecture/quest/path/'.$id);
        }
    }


    public function edit_path() {
        $id_quest_path = $this->uri->segment(5);
        $data['title'] = "Edit Quest Path";
        $data['quest_path'] = $this->questmodel->getQuestPath($id_quest_path)->row_array();
        $data['status'] = $data['quest_path']['status'];


        $this->template->load('base_lecture', 'lecture/quest/edit_path', $data);

        
    }

    public function save_edit_path() {
        if (isset($_POST['save_edit_path'])) {
            $id = $this->input->post('id_course');
            $data_path = array(
                'title_path' => $this->input->post('title'),
                'keterangan' => $this->input->post('keterangan')
            );
    
            $this->db->where('id_course', $id);
            $this->db->update('course_detail', $data);
            redirect('lecture/quest/path/'.$this->input->post('id_course'));
        }
        else {
            redirect('lecture/quest/path/'.$this->input->post('id_course'));
        }
    }

    public function delete_path() {
        $id_course_detail = $this->uri->segment(6);
        $id_course = $this->uri->segment(4);
        
        $this->db->delete('course_detail', array('id' => $id_course_detail));

        redirect('lecture/quest/path/'.$id_course);

        
    }

}
