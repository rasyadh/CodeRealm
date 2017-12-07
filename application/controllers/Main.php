<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('skillsmodel');
    }

	public function index() {
		$data['title'] = "Role Playing Code";

		$data['skills'] = json_decode($this->skillsmodel->getMainPage());

		$this->template->load('base', 'main/index', $data);
	}

	public function about() {
		$data['title'] = "About";

		$this->template->load('base', 'main/about', $data);
	}
}
