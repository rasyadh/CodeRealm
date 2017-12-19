<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('skillsmodel');
    }

	public function index() {
		$data['title'] = "Skills Path";

		$data['skills'] = json_decode($this->skillsmodel->getMainPage());

		$this->template->load('base', 'skills/index', $data);
	}

	public function content() {
		$this->load->model('usersmodel');
		$title = str_replace("skills/", "", uri_string());

		$data['title'] = $title;

		$data['content'] = json_decode($this->skillsmodel->getSkillContent(current_url()));

		if (isset($this->session->userdata['user_signed_in'])) {
			$email = $this->session->userdata['user_signed_in']['email'];
			$user = $this->usersmodel->getUser($email)->row_array();
			$user_data = $this->skillsmodel->getEnrollStatus($user['id_user'], $data['content'][0]->idSkill)->row_array();
			$users = array(
				'id_user' => $user['id_user'],
				'id_skill' => $data['content'][0]->idSkill
			);
			$data['user'] = $users;
			$data['enroll'] = $user_data;
		}

		$this->template->load('base', 'skills/skill-content', $data);
	}

	public function enroll($id_user, $id_skill) {
		$enroll_data = array(
			'id_skill' => $id_skill,
			'id_user' => $id_user,
			'enroll_status' => true
		);
		$enroll_skill = $this->skillsmodel->getEnrollStatus($id_user, $id_skill)->row_array();

		if ($enroll_skill != null) {
			$this->db->where('id_enroll_skills', $enroll_skill['id_enroll_skills']);
			$this->db->update('enroll_skills', $enroll_data);
		}
		else {
			$data = array(
				'id_badge' => $id_skill,
				'id_user' => $id_user
			);
			$this->db->insert('enroll_skills', $enroll_data);
			$this->db->insert('badgenuser', $data);
		}
		$result = $this->skillsmodel->getSkill($id_skill)->row_array();

		redirect($result['enroll_url']);
	}

	public function unenroll($id, $id_skill, $status) {
		$enroll_data = array(
			'enroll_status' => false
		);

		$this->db->where('id_enroll_skills', $id);
		$this->db->update('enroll_skills', $enroll_data);
		$result = $this->skillsmodel->getSkill($id_skill)->row_array();

		redirect($result['enroll_url']);
	}

	public function download($content) {
		force_download('uploads/file/'.$content, NULL);
	}
}