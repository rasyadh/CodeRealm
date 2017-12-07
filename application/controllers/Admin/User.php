<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('adminmodel');
    }

	public function index() {
		$data['title'] = "User";
		$data['data_users'] = $this->adminmodel->getAllUser()->result();

		$this->template->load('base_admin', 'admin/user', $data);
    }
}
