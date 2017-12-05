<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adminmodel');
    }

	public function index() {
        $data['title'] = "Admin Site";

		$this->template->load('base_sign', 'admin/index', $data);
    }
    
    public function dashboard() {
        $data['title'] = "Dashboard";
        
        $this->template->load('base_admin', 'admin/dashboard', $data);
    }

    public function account() {
        $data['title'] = "Admin Account";

        $this->template->load('base_admin', 'admin/account', $data);
    }

    public function admin_signin() {
        if (isset($_POST['signin'])) {
            if (isset($this->session->userdata['admin_signed_in'])) {
                redirect('admin/dashboard');
            }
            else {
                redirect('admin');
            }
        }
        else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            $result = $this->adminmodel->signin($data);

            if ($result == TRUE) {
                $email = $this->input->post('email');
                $result = $this->adminmodel->read_admin_info($email);

                if ($result != FALSE) {
                    $session_data = array(
                        'email' => $result[0]->email
                    );

                    $this->session->set_userdata('admin_signed_in', $session_data);
                    redirect('admin/dashboard');
                }
            }
            else {
                $data = array(
                    'title' => 'Admin Page'
                );

                $this->template->load('base_sign', 'admin/index', $data);
            }
        }
    }

    public function admin_signout() {
        $session_arr = array(
            'email' => ''
        );

        $this->session->unset_userdata('admin_signed_in', $session_arr);
        redirect('admin');
    }
}
