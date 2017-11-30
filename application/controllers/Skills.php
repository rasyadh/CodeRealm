<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

	public function index() {
		$data['title'] = "Skills Path";

		$data_skill = file_get_contents('assets/API/skills.json');
		$data['skill_path'] = json_decode($data_skill);
		$data['signin'] = true;

		$this->template->load('base', 'skills/index', $data);
	}

	public function content() {
		$title = str_replace("skills/", "", uri_string());

		$data['title'] = $title;
		$data['signin'] = true;

		$content = file_get_contents('assets/API/Skills/'.$title.'.json');
		$data['skill_content'] = json_decode($content);

		$this->template->load('base', 'skills/skill-content', $data);
	}
}
