<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

	public function index(){
		$data['title'] = "Quest Courses";
		
		$data_skill = file_get_contents('assets/API/skills.json');
		$data['skill_path'] = json_decode($data_skill);

		$this->template->load('base', 'quest/index', $data);
	}
}
