<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function index(){
		if (isset($this->session->userdata['user_signed_in'])) {
			$data['title'] = "Notification";
			
			$this->template->load('base', 'notification/index', $data);	
		}
		else {
			redirect('signin');
		}
	}
}
