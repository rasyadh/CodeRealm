<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('lecturemodel');
    }

	public function index() {
        $data['title'] = "Lecture Site";

		$this->template->load('base_sign', 'lecture/index', $data);
    }

    public function dashboard() {
        $data['title'] = "Dashboard";
        
        $this->template->load('base_lecture', 'lecture/dashboard', $data);
    }

    public function account() {
        $data['title'] = "Lecture Account";
        $email = $this->session->userdata['lecture_signed_in']['email'];

        $data['account'] = $this->lecturemodel->getLecture($email)->row_array();

        $this->template->load('base_lecture', 'lecture/account', $data);
    }

    public function signin() {
        if (isset($_POST['signin'])) {
            if (isset($this->session->userdata['lecture_signed_in'])) {
                redirect('lecture/dashboard');
            }
            else {
                redirect('lecture');
            }
        }
        else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            $result = $this->lecturemodel->signin($data)->row_array();

            if ($result == TRUE) {
                $email = $this->input->post('email');
                $result = $this->lecturemodel->getLecture($email)->row_array();

                if ($result != FALSE) {
                    $session_data = array(
                        'email' => $result['email']
                    );
                    
                    $this->session->set_userdata('lecture_signed_in', $session_data);

                    redirect('lecture/dashboard');
                }
            }
            else {
                redirect('lecture');
            }
        }
    }

    public function signout() {
        $session_arr = array(
            'email' => ''
        );

        $this->session->unset_userdata('lecture_signed_in', $session_arr);
        redirect('lecture');
    }    

    public function change_photo() {
        if (isset($_POST['change_photo'])) {
            $config['upload_path'] = 'assets/image/Lecture/';
            $config['allowed_types'] = 'jpg';
            $this->load->library('upload', $config);

            $id = $this->input->post('id_lecture');

            $data_account = array();
            if ($this->upload->do_upload('url')) {
                $upload_data = $this->upload->data();

                $data_account['photo_url'] = site_url().$config['upload_path'].$upload_data['file_name'];

                $this->db->where('id_lecture', $id);
                $this->db->update('lecture', $data_account);
            }
            redirect('lecture/account');
        }
        else {
            redirect('lecture/account');
        }
    }

    public function save_account() {
        if (isset($_POST['save_account'])) {
            $id = $this->input->post('id_lecture');

            $data_account = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            );

            $this->db->where('id_lecture', $id);
            $this->db->update('lecture', $data_account);

            redirect('lecture/account');
        }
        else {
            redirect('lecture/account');
        }
    }

    public function change_password() {
        if (isset($_POST['change_password'])) {
            $id = $this->input->post('id_lecture');
            $current_pass = $this->input->post('current_password');

            $result = $this->lecturemodel->checkPass($id, $current_pass)->row_array();

            $data_account = array();
            if ($result == TRUE) {
                $data_account['password'] = $this->input->post('new_password');

                $this->db->where('id_lecture', $id);
                $this->db->update('lecture', $data_account);
            }

            redirect('lecture/account');
        }
        else {
            redirect('lecture/account');
        }
    }

}
