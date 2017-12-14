<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('questmodel');
    }

	public function index() {
        $data['title'] = "Quest Course";

		$this->template->load('base_lecture', 'lecture/quest/quest', $data);
    }

}
