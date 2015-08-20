<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class course extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_userCourse');
		$this->load->model('model_slide');
	}
	
	public function index() {
		if($this->session->userdata('logged_in')) {
			$query = $this->model_course->GetCourse();
			$getCompletion = $this->model_userCourse->GetUserCourses();

			if ($query) {
				$data['courses'] = $query;
			}

			if ($getCompletion) {
				$data['userCourses'] = $getCompletion;
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
			redirect('login', 'refresh');
		}
	}
}
?>