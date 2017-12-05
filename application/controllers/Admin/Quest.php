<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

	public function index() {
		$data['title'] = "Quest Courses";

		$this->template->load('base_admin', 'admin/quest/quest', $data);
    }
}
