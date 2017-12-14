<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel');
    }

    public function signin(){
        $data['title'] = "Sign In";

        $this->template->load('base_sign', 'users/signin', $data);
    }

    public function signup(){
        $data['title'] = "Sign Up";
        
        $this->template->load('base_sign', 'users/signup', $data);
    }

    public function auth_signin() {
        if (isset($_POST['auth_signin'])) {
            if (isset($this->session->userdata['user_signed_in'])) {
                redirect('account');
            }
            else {
                redirect('signin');
            }
        }
        else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            $result = $this->usersmodel->signin($data)->row_array();

            if ($result == TRUE) {
                $email = $this->input->post('email');
                $result = $this->usersmodel->getUser($email)->row_array();

                if ($result != FALSE) {
                    $session_data = array(
                        'email' => $result['email'],
                        'photo_url' => $result['photo_url']
                    );
                    
                    $this->session->set_userdata('user_signed_in', $session_data);

                    redirect('account');
                }
            }
            else {
                redirect('signin');
            }
        }
    }

    public function auth_signup() {
        if (isset($_POST['auth_signup'])) {
            if (isset($this->session->userdata['user_signed_in'])) {
                redirect('account');
            }
            else {
                redirect('signup');
            }
        }
        else {
            $data = array(
                'id_role' => 3,
                'name' => $this->input->post('name'),
                'email' => strtolower($this->input->post('email')),
                'username' => strtolower($this->input->post('username')),
                'password' => $this->input->post('password'),
                'photo_url' => 'http://localhost/CodeRealm/assets/image/logo.svg'
            );
            $result = $this->usersmodel->signup($data);

            if ($result == TRUE) {
                redirect('signin');
            } 
            else {
                redirect('signup');
            }
        }
    }

    public function signout() {
        $session_arr = array(
            'email' => '',
            'photo_url' => ''
        );

        $this->session->unset_userdata('user_signed_in', $session_arr);
        redirect('/');
    }
}