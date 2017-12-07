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
        $email = $this->session->userdata['admin_signed_in']['email'];

        $data['account'] = $this->adminmodel->getAdmin($email)->row_array();

        $this->template->load('base_admin', 'admin/account', $data);
    }

    public function signin() {
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

            $result = $this->adminmodel->signin($data)->row_array();

            if ($result == TRUE) {
                $email = $this->input->post('email');
                $result = $this->adminmodel->getAdmin($email)->row_array();

                if ($result != FALSE) {
                    $session_data = array(
                        'email' => $result['email']
                    );
                    
                    $this->session->set_userdata('admin_signed_in', $session_data);

                    redirect('admin/dashboard');
                }
            }
            else {
                redirect('admin');
            }
        }
    }

    public function signout() {
        $session_arr = array(
            'email' => ''
        );

        $this->session->unset_userdata('admin_signed_in', $session_arr);
        redirect('admin');
    }

    public function change_photo() {
        if (isset($_POST['change_photo'])) {
            $config['upload_path'] = 'assets/image/Admin/';
            $config['allowed_types'] = 'jpg|png';
            $this->load->library('upload', $config);

            $id = $this->input->post('id_admin');

            $data_account = array();
            if ($this->upload->do_upload('url')) {
                $upload_data = $this->upload->data();

                $data_account['photo_url'] = site_url().$config['upload_path'].$upload_data['file_name'];

                $this->db->where('id_admin', $id);
                $this->db->update('admin', $data_account);
            }
            redirect('admin/account');
        }
        else {
            redirect('admin/account');
        }
    }

    public function save_account() {
        if (isset($_POST['save_account'])) {
            $id = $this->input->post('id_admin');

            $data_account = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            );

            $this->db->where('id_admin', $id);
            $this->db->update('admin', $data_account);

            redirect('admin/account');
        }
        else {
            redirect('admin/account');
        }
    }

    public function change_password() {
        if (isset($_POST['change_password'])) {
            $id = $this->input->post('id_admin');
            $current_pass = $this->input->post('current_password');

            $result = $this->adminmodel->checkPass($id, $current_pass)->row_array();

            $data_account = array();
            if ($result == TRUE) {
                $data_account['password'] = $this->input->post('new_password');

                $this->db->where('id_admin', $id);
                $this->db->update('admin', $data_account);
            }

            redirect('admin/account');
        }
        else {
            redirect('admin/account');
        }
    }
}
