<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pvp extends CI_Controller {

	public function index(){
		$data['title'] = "PvP";
		$data['signin'] = true;
        
        $this->template->load('base', 'pvp/index', $data);
	}
}
