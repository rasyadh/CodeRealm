<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index() {
		$data['title'] = "User";

		$this->template->load('base_admin', 'admin/user', $data);
    }
}
