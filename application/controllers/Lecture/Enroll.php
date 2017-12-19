<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enroll extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('lecturemodel');
        $this->load->helper('dump');
    }

	public function index() {
        $data['title'] = "Enroll User";

        if($this->lecturemodel->getAllCourseUser()){
            $data['users'] = $this->lecturemodel->getAllCourseUser()->result();
        }else{
            $data['users'] = [];
        }

		$this->template->load('base_lecture', 'lecture/enroll/enroll', $data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        
        $this->lecturemodel->delete($id);

        redirect('lecture/enroll');
    }
}
