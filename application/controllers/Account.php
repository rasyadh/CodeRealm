<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index() {
		$data['title'] = "Account";
		$data['signin'] = true;

		$this->template->load('base', 'account/index', $data);
    }
    
    public function history() {
        $data['title'] = "History";
        $data['signin'] = true;

        $this->template->load('base', 'account/history', $data);
    }

    public function rewards() {
        $data['title'] = "Rewards";
        $data['signin'] = true;

        $this->template->load('base', 'account/rewards', $data);
    }

    public function profile() {
        $data['title'] = "Profile";
        $data['signin'] = true;

        $this->template->load('base', 'account/profile', $data);
    }

    public function report() {
        $data['title'] = "Report Card";
        $data['signin'] = true;

        $this->template->load('base', 'account/report', $data);
    }
}
