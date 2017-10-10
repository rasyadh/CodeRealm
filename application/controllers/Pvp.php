<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pvp extends CI_Controller {

	public function index(){
		$data['title'] = "PvP";
        
        $this->template->load('base', 'main/pvp', $data);
	}
}
