<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

	public function index() {
		$this->load->model('skillsmodel');
		$data['title'] = "Skills Path";

		$data['skills'] = json_decode($this->skillsmodel->getMainPage());

		$this->template->load('base', 'skills/index', $data);
	}

	public function content() {
		$this->load->model('skillsmodel');
		$title = str_replace("skills/", "", uri_string());

		$data['title'] = $title;

		$data['content'] = json_decode($this->skillsmodel->getSkillContent(current_url()));

		$this->template->load('base', 'skills/skill-content', $data);
	}
}
