<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Learning extends CI_Controller {
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
			$data['menu'] = "course";
			
			$query = $this->model_course->GetCourseById();

			if ($query) {
				$data['courses'] = $query;
			}

			$slides = $this->model_slide->GetSlide();

			if ($slides) {
				$data['slides'] = $slides;
			}
			//var_dump($slides);
			$this->load->view('header', $data);
			$this->load->view('view_learning', $data);
		} else {
			 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}
}
?>