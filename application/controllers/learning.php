<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Learning extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('course_model');
		$this->load->model('slide_model');
	}

	public function index() {

		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "course";
			
			$query = $this->course_model->GetCourseById();

			if ($query) {
				$data['courses'] = $query;
			}

			$slides = $this->slide_model->GetSlide();

			if ($slides) {
				$data['slides'] = $slides;
			}
			//var_dump($slides);
			$this->load->view('header',$data);
			$this->load->view('view_learning',$data);
		} else {
			 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}
}
?>