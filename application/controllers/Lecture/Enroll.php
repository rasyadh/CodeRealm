<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enroll extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('lecturemodel');
    }

	public function index() {
        $data['title'] = "Enroll User";

		$this->template->load('base_lecture', 'lecture/enroll/enroll', $data);
    }

}
