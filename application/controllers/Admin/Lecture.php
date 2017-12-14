<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('adminmodel');
    }

	public function index() {
		$data['title'] = "Lecture";
		$data['data_lectures'] = $this->adminmodel->getAllLecture()->result();

		$this->template->load('base_admin', 'admin/lecture', $data);
	}
	
	public function add_lecture() {
		if (isset($_POST['add_lecture'])) {
            $config['upload_path'] = 'assets/image/Lecture/';
            $config['allowed_types'] = 'jpg';
            $config['max_size'] = '1000';
            $this->load->library('upload', $config);

            $data_lecture = array();
            if ($this->upload->do_upload('photo_url')) {
                $upload_data = $this->upload->data();
				
				$data_lecture['id_role'] = 2;
                $data_lecture['name'] = $this->input->post('name');
				$data_lecture['email'] = strtolower($this->input->post('email'));
				$data_lecture['password'] = $this->input->post('password');
                $data_lecture['photo_url'] = site_url().$config['upload_path'].$upload_data['file_name'];                

                $this->db->insert('lecture', $data_lecture);
            }

            redirect('admin/lecture');
        }
        else {
            redirect('admin/lecture');
        }
	}
}