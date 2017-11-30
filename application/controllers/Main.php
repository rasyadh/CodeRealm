<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() {
		$data['title'] = "Role Playing Code";

		$data_skill = file_get_contents('assets/API/skills.json');
		$data['skill_path'] = json_decode($data_skill);
		$data['signin'] = true;

		$this->template->load('base', 'main/index', $data);
	}

	public function about() {
		$data['title'] = "About";
		$data['signin'] = true;

		$this->template->load('base', 'main/about', $data);
	}
}
