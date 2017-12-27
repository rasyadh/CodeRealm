<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

	public function index() {
		$this->load->model('questmodel');
		$data['title'] = "Quest Courses";

		$data['quests'] = $this->questmodel->getAllQuest()->result();

		$this->template->load('base_admin', 'admin/quest/quest', $data);
    }
}
