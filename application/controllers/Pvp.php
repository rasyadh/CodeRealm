<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pvp extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('pevepemodel');
    }

	public function index(){
		$data['title'] = "PvP";
		
		if (isset($this->session->userdata['user_signed_in'])) {
            $id = $this->session->userdata['user_signed_in']['id'];
        }else{
			redirect('signin');			
		}
		
		$data['friends'] = $this->pevepemodel->getFriend($id)->result();
		
		foreach($data['friends'] as $friend){
			if($friend->ida."" == $id){			
				$friend->ida = $friend->idb;
				$friend->namea = $friend->nameb;
				$friend->photo_urla = $friend->photo_urlb;
			}else{
			}
		}

        $this->template->load('base', 'pvp/index', $data);
	}

	public function challenge(){
		$data['title'] = "PvP";
		$id_musuh = $id_skill = $this->uri->segment(3);

		if (isset($this->session->userdata['user_signed_in'])) {
            $id = $this->session->userdata['user_signed_in']['id'];
        }else{
			redirect('signin');			
		}

		$statgw = $this->pevepemodel->getStats($id);
		$statmusuh = $this->pevepemodel->getStats($id_musuh);

		if(!$statgw || !$statmusuh){
			redirect('pvp');
		}

		$data['statgw'] = $statgw->row();
		$data['statmusuh'] = $statmusuh->row();

		$this->template->load('base', 'pvp/challenge', $data);
	}
}
