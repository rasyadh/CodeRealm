<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function signin(){
        $data['title'] = "Sign In";

        $this->template->load('base-sign', 'users/signin', $data);
    }

    public function signup(){
        $data['title'] = "Sign Up";
        
        $this->template->load('base-sign', 'users/signup', $data);
    }
}