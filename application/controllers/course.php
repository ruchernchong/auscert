<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('course_model');
		$this->load->model('user_course_model');
		$this->load->model('slide_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in')) {
			$query = $this->course_model->GetCourse();
			$getCompletion = $this->user_course_model->GetUserCourses();

			if ($query) {
				$data['courses'] = $query;
			}

			if ($getCompletion) {
				$data['user_courses'] = $getCompletion;
			}

			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "course";

			$this->load->view('header', $data);
			$this->load->view('view_course', $data);
		}
		else
		{
			 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}
}
?>