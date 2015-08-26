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

			$query = $this->model_course->GetCourseById();

			if ($query) {
				$data['courses'] = $query;
			}

			$slides = $this->model_slide->GetSlide();

			if ($slides) {
				$data['slides'] = $slides;
			}

			// If user is not admin, redirect to dashboard.
			if ($data['usertype'] != "admin") {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {
				$this->load->view('header', $data);
				$this->load->view('view_edit_course');
			}
		} else {
			 //If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
}
?>