<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

	public function index() {
        $this->load->model('skillsmodel');
        $data['title'] = "Skills Path";
        $data['data_skills'] = $this->skillsmodel->skillsList()->result();

		$this->template->load('base_admin', 'admin/skills/skills', $data);
    }

    public function path() {
        $this->load->model('skillsmodel');
        $id_skill = $this->uri->segment(4);

        $data['title'] = "Skills Path";
        $data['skill'] = $this->skillsmodel->getSkill($id_skill)->row_array();
        
        $this->template->load('base_admin', 'admin/skills/path', $data);
    }

    public function course() {
        $data['title'] = "Path Course";
        
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
        $this->load->model('skillsmodel');
        $id_skill = $this->uri->segment(4);
        $data['title'] = "Edit Skill Path";
        $data['skill'] = $this->skillsmodel->getSkill($id_skill)->row_array();

        $this->template->load('base_admin', 'admin/skills/edit_skill', $data);
    }

    public function save_edit() {
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
    }
}