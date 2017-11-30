<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function index(){
		$data['title'] = "Notification";
		$data['signin'] = true;

		$this->template->load('base', 'notification/index', $data);
	}
}
