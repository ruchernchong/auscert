<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Edits extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_course');
		$this->load->model('model_slide');
	}

	public function index() {

		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "adminpage";

			$this->load->view('header',$data);
			$this->load->view('view_editCourse');
		} else {
			 //If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
}
?>