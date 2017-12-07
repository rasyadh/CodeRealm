<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel');
    }

	public function index() {
        if (isset($this->session->userdata['user_signed_in'])) {
            $data['title'] = "Account";
            
            $this->template->load('base', 'account/index', $data);
        }
        else {
            redirect('signin');
        }
    }
    
    public function history() {
        if (isset($this->session->userdata['user_signed_in'])) {
            $data['title'] = "History";
            
            $this->template->load('base', 'account/history', $data);
        }
        else {
            redirect('signin');
        }
    }

    public function rewards() {
        if (isset($this->session->userdata['user_signed_in'])) {
            $data['title'] = "Rewards";
            
            $this->template->load('base', 'account/rewards', $data);   
        }
        else {
            redirect('signin');
        }
    }

    public function profile() {
        if (isset($this->session->userdata['user_signed_in'])) {
            $email = $this->session->userdata['user_signed_in']['email'];

            $data['title'] = "Profile";
            $data['data_user'] = $this->usersmodel->getUser($email)->result();
            
            $this->template->load('base', 'account/profile', $data);   
        }
        else {
            redirect('signin');
        }
    }

    public function report() {
        if (isset($this->session->userdata['user_signed_in'])) {
            $data['title'] = "Report Card";
            
            $this->template->load('base', 'account/report', $data);   
        }
        else {
            redirect('signin');
        }
    }
}
