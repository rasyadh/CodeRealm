<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('questmodel');
	}

	public function index(){
		$data['title'] = "Quest Courses";
		
		$data['quests'] = json_decode($this->questmodel->getMainPage());		

		$this->template->load('base', 'quest/index', $data);
	}

	public function content() {
		$this->load->model('usersmodel');
		$title = str_replace('quest/', "", uri_string());
		$data['title'] = $title;

		$data['content'] = json_decode($this->questmodel->getQuestContent(current_url()));

		if (isset($this->session->userdata['user_signed_in'])) {
			$email = $this->session->userdata['user_signed_in']['email'];
			$user = $this->usersmodel->getUser($email)->row_array();
			
		}

		$this->template->load('base', 'quest/quest-content', $data);
	}

}
