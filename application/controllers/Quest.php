<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('questmodel');
	}

	public function index(){
		$data['title'] = "Quest Courses";
		
		$data['quests'] = json_decode($this->questmodel->getMainPage());		

		$this->template->load('base', 'quest/index', $data);
	}

	public function content() {
		$this->load->model('usersmodel');
		$title = str_replace('quest/', "", uri_string());
		$data['title'] = $title;

		$data['content'] = json_decode($this->questmodel->getQuestContent(current_url()));

		if (isset($this->session->userdata['user_signed_in'])) {
			$email = $this->session->userdata['user_signed_in']['email'];
			$user = $this->usersmodel->getUser($email)->row_array();
			$user_data = $this->questmodel->getEnrollStatus($user['id_user'], $data['content'][0]->id)->row_array();
			$users = array(
				'id_user' => $user['id_user'],
				'id_course' => $data['content'][0]->id
			);
			$data['user'] = $users;
			$data['enroll'] = $user_data;
		}

		$this->template->load('base', 'quest/quest-content', $data);
	}

	public function course() {
		$this->load->model('usersmodel');
		$data['title'] = 'Course';

	}

	public function enroll($id_user, $id_course) {
		$enroll_data = array(
			'id_course' => $id_course,
			'id_user' => $id_user,
			'enroll_status' => true
		);
		$enroll_course = $this->questmodel->getEnrollStatus($id_user, $id_course)->row_array();

		if ($enroll_course != null) {
			$this->db->where('id', $enroll_course['id']);
			$this->db->update('enroll_course', $enroll_data);
		}
		else {
			$this->db->insert('enroll_course', $enroll_data);
		}
		$result = $this->questmodel->getQuest($id_course)->row_array();

		redirect($result['enroll_url']);
	}

	public function unenroll($id, $id_course, $status) {
		$enroll_data = array(
			'enroll_status' => false
		);

		$this->db->where('id', $id);
		$this->db->update('enroll_course', $enroll_data);
		$result = $this->questmodel->getQuest($id_course)->row_array();

		redirect($result['enroll_url']);
	}

	public function upload() {
		if (isset($_POST['upload_file'])) {
			$config['ipload_path'] = 'uploads/file';
			$config['allowed_types'] = 'docx';
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('file')) {
				$upload_data = $this->upload->data();
			}

			$url = $this->input->post('url');
			redirect('quest');
		}
		else {
			redirect('quest');
		}
	}
}
