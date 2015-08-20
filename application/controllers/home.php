<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class home extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->model('model_course');
		$this->load->model('model_user');
		$this->load->model('model_userCourse');
		$this->load->model('model_group');
	}
	public function index() {
		if ($this->session->userdata('logged_in')) {
			$courses = $this->model_course->GetCourse();
			if ($courses) {
			// 	//remove courses that are already enrolled
			// 	foreach ($courses as $course) {
			// 		$taken = $this->model_userCourse->GetUserCourses();
			// 		if (in_array($courses, $taken)) {
			// 			$course += $course;
			// 		}
			// 	}
				$data['courses'] = $courses;
			}

			$query = $this->model_userCourse->GetUserCourses();
			if ($query) {
				$data['user_courses'] = $query;
			}

			$count = $this->model_userCourse->GetNumberOfUserCourses();
			if ($count) {
				$data['NoOfUserCourses'] = $count;
			}

			$count = $this->model_course->GetNumberOfCourses();
			if ($count) {
				$data['NoOfCourses'] = $count;
			}

			$count = $this->model_group->GetNumberofGroups();
			if ($count) {
				$data['NoOfGroups'] = $count;
			}

			$groups = $this->model_group->GetGroups();
			if ($groups) {
				$data['userGroups'] = $groups;
			}

			$session_data = $this->session->userdata('logged_in');
			$data['userID'] = $session_data['userID'];
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['email'] = $session_data['email'];
			$data['menu'] = "home";

			$this->load->view('header',$data);
			$this->load->view('view_dashboard');
			// $this->load->view("footer");
		} else {
			 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}

	function EnrolToCourse() {
		$session_data = $this->session->userdata('logged_in');
		$courseID = $this->input->get('id', TRUE);
		$this->model_userCourse->RegisterToCourse($session_data['userID'], $courseID);

		redirect('home', 'refresh');
	}

	function logout() {
		$this->session->unset_userdata('logged_in');
		redirect('home','refresh');
		session_destroy();
	}
}
?>