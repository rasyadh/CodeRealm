<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel');
        $this->load->model('accountmodel');
    }

	public function index() {
        if (isset($this->session->userdata['user_signed_in'])) {
            $data['title'] = "Account";
            
            $email = $this->session->userdata['user_signed_in']['email'];
            $user = $this->usersmodel->getUser($email)->row_array();
            $data['enroll_skill'] = json_decode($this->accountmodel->getKeepPlayingSkills($user['id_user']));
            $data['badges'] = json_decode($this->accountmodel->getBadges($user['id_user']));

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

            $email = $this->session->userdata['user_signed_in']['email'];
            $user = $this->usersmodel->getUser($email)->row_array();
            $data['badges'] = json_decode($this->accountmodel->getBadges($user['id_user']));
            
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
            $data['account'] = $this->usersmodel->getUser($email)->row_array();
            
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

    public function change_photo() {
        if (isset($_POST['change_photo'])) {
            $config['upload_path'] = 'assets/image/User/';
            $config['allowed_types'] = 'jpg|png';
            $this->load->library('upload', $config);

            $id = $this->input->post('id_user');

            $data_account = array();
            if ($this->upload->do_upload('url')) {
                $upload_data = $this->upload->data();

                $data_account['photo_url'] = site_url().$config['upload_path'].$upload_data['file_name'];

                $this->db->where('id_user', $id);
                $this->db->update('user', $data_account);
            }
            redirect('account/profile');
        }
        else {
            redirect('account/profile');
        }
    }

    public function save_account() {
        if (isset($_POST['save_account'])) {
            $id = $this->input->post('id_user');

            $data_account = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username')
            );

            $this->db->where('id_user', $id);
            $this->db->update('user', $data_account);

            redirect('account/profile');
        }
        else {
            redirect('account/profile');
        }
    }

    public function change_password() {
        if (isset($_POST['change_password'])) {
            $id = $this->input->post('id_user');
            $current_pass = $this->input->post('current_password');

            $result = $this->accountmodel->checkPass($id, $current_pass)->row_array();

            $data_account = array();
            if ($result == TRUE) {
                $data_account['password'] = $this->input->post('new_password');

                $this->db->where('id_user', $id);
                $this->db->update('user', $data_account);
            }

            redirect('account/profile');
        }
        else {
            redirect('account/profile');
        }
    }

    public function delete_account() {
        if (isset($_POST['delete_account'])) {
            $id = $this->input->post('id_user');
            $current_pass = $this->input->post('current_password');

            $result = $this->accountmodel->checkPass($id, $current_pass)->row_array();

            if ($result == TRUE) {
                $this->db->where('id_user', $id);
                $this->db->delete('user');

                $session_arr = array(
                    'email' => '',
                    'photo_url' => ''
                );
        
                $this->session->unset_userdata('user_signed_in', $session_arr);
                redirect('/');
            }
        }
        else {
            redirect('account/profile');
        }
    }
}
