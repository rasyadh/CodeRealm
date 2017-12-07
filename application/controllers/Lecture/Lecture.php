<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends CI_Controller {

	public function index() {
        $data['title'] = "Lecture Site";

		$this->template->load('base_sign', 'lecture/index', $data);
    }

    public function dashboard() {
        $data['title'] = "Dashboard";
        
        $this->template->load('base_lecture', 'lecture/dashboard', $data);
    }

}
