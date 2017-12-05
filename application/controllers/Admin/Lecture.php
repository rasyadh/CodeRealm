<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends CI_Controller {

	public function index() {
		$data['title'] = "Lecture";

		$this->template->load('base_admin', 'admin/lecture', $data);
    }
}
