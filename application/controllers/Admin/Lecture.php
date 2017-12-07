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
}