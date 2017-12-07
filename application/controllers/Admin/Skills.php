<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('skillsmodel');
    }

	public function index() {
        $data['title'] = "Skills Path";
        $data['data_skills'] = $this->skillsmodel->getAllSkill()->result();

		$this->template->load('base_admin', 'admin/skills/skills', $data);
    }

    public function path() {
        $id_skill = $this->uri->segment(4);

        $data['title'] = "Skills Path";
        $data['skill'] = $this->skillsmodel->getSkill($id_skill)->row_array();
        $data['data_path'] = $this->skillsmodel->getAllPath($id_skill)->result();
        
        $this->template->load('base_admin', 'admin/skills/path', $data);
    }

    public function course() {
        $id_path = $this->uri->segment(5);

        $data['title'] = "Path Course";
        $data['path'] = $this->skillsmodel->getPath($id_path)->row_array();
        $data['data_course'] = $this->skillsmodel->getAllCourse($id_path)->result();
        
        $this->template->load('base_admin', 'admin/skills/course', $data);
    }

    public function add_skill() {
        if (isset($_POST['add_skill'])) {
            $config['upload_path'] = 'assets/image/Badge/';
            $config['allowed_types'] = 'png|jpg ';
            $config['max_size'] = '1000';
            $this->load->library('upload', $config);

            $data_skill = array();
            if ($this->upload->do_upload('skill_badge')) {
                $upload_data = $this->upload->data();
                
                $data_skill['skill_name'] = $this->input->post('name');
                $data_skill['description'] = $this->input->post('description');
                $data_skill['skill_badge'] = site_url().$config['upload_path'].$upload_data['file_name'];
                $data_skill['enroll_url'] = $this->input->post('enroll_url');

                $this->db->insert('skills', $data_skill);
            }

            redirect('admin/skills');
        }
        else {
            redirect('admin/skills');
        }
    }

    public function edit_skill() {
        $id_skill = $this->uri->segment(4);
        $data['title'] = "Edit Skill";
        $data['skill'] = $this->skillsmodel->getSkill($id_skill)->row_array();

        $this->template->load('base_admin', 'admin/skills/edit_skill', $data);
    }

    public function save_edit_skill() {
        if (isset($_POST['save_edit'])) {
            $id = $this->input->post('id_skill');
            $data_skill = array(
                'skill_name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'enroll_url' => $this->input->post('enroll_url')
            );
    
            $this->db->where('id_skill', $id);
            $this->db->update('skills', $data_skill);
            redirect('admin/skills');
        }
        else {
            redirect('admin/skills');
        }
    }

    public function add_path() {
        if (isset($_POST['add_path'])) {
            $id = $this->input->post('id_skill');

            $data_path = array(
                'id_skill' => $id,
                'title_path' => $this->input->post('title'),
                'description' => $this->input->post('description')
            );
            
            $this->db->insert('skill_path', $data_path);

            redirect('admin/skills/path/'.$id);
        }
        else {
            redirect('admin/skills/path/'.$id);
        }
    }

    public function edit_path() {
        $id_skill_path = $this->uri->segment(5);
        $data['title'] = "Edit Skill Path";
        $data['path'] = $this->skillsmodel->getPath($id_skill_path)->row_array();

        $this->template->load('base_admin', 'admin/skills/edit_path', $data);
    }

    public function save_edit_path() {
        if (isset($_POST['save_edit_path'])) {
            $id = $this->input->post('id_skill_path');
            $data_path = array(
                'title_path' => $this->input->post('title'),
                'description' => $this->input->post('description')
            );
    
            $this->db->where('id_skill_path', $id);
            $this->db->update('skill_path', $data_path);
            redirect('admin/skills/path/'.$this->input->post('id_skill'));
        }
        else {
            redirect('admin/skills/path/'.$this->input->post('id_skill'));
        }
    }

    public function add_course() {
        if (isset($_POST['add_course'])) {
            $config['upload_path'] = 'assets/image/Course/';
            $config['allowed_types'] = 'png|jpg ';
            $config['max_size'] = '1000';
            $this->load->library('upload', $config);

            $id = $this->input->post('id_skill_path');
            $data_course = array();
            if ($this->upload->do_upload('skill_course_badge')) {
                $upload_data = $this->upload->data();
                
                $data_course['id_skill_path'] = $id;
                $data_course['name_course'] = $this->input->post('name');
                $data_course['description'] = $this->input->post('description');
                $data_course['skill_course_url'] = $this->input->post('skill_course_url');
                $data_course['skill_course_badge'] = site_url().$config['upload_path'].$upload_data['file_name'];

                $this->db->insert('skill_course', $data_course);
            }

            redirect('admin/skills/path/course/'.$id);
        }
        else {
            redirect('admin/skills/path/course/'.$id);
        }
    }

    public function edit_course() {
        $id_skill_course = $this->uri->segment(6);
        $data['title'] = "Edit Skill Path";
        $data['course'] = $this->skillsmodel->getCourse($id_skill_course)->row_array();

        $this->template->load('base_admin', 'admin/skills/edit_course', $data);
    }

    public function save_edit_course() {
        if (isset($_POST['save_edit_course'])) {
            $id = $this->input->post('id_skill_course');
            $data_course = array(
                'name_course' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'skill_course_url' => $this->input->post('skill_course_url')
            );
    
            $this->db->where('id_skill_course', $id);
            $this->db->update('skill_course', $data_course);
            redirect('admin/skills/path/course/'.$this->input->post('id_skill_path'));
        }
        else {
            redirect('admin/skills/path/course/'.$this->input->post('id_skill_path'));
        }
    }
}