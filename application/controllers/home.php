<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class home extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_course');
		$this->load->model('model_user');
		$this->load->model('model_userCourse');
		$this->load->model('model_group');
	}

	public function index() {
		if ($this->session->userdata('logged_in')) {

			$courses = $this->model_course->GetAllCourses();
			$userCourses = $this->model_userCourse->GetUserCourses();

			if ($courses) {
				$coursesAvail = array_udiff($courses, $userCourses, function ($courses, $userCourses) {
					return $courses->courseID - $userCourses->courseID;
				});

				$data['courses'] = $courses;
				$data['coursesAvail'] = $coursesAvail;
				$data['count_coursesAvail'] = count($coursesAvail);
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
			redirect('login', 'refresh');
		}
	}

	function EnrolToCourse() {
		$session_data = $this->session->userdata('logged_in');
		$courseID = $this->input->get('id', TRUE);
		$this->model_userCourse->RegisterToCourse($session_data['userID'], $courseID);

		redirect('home', 'refresh');
	}

	function dropCourse() {
		$session_data = $this->session->userdata('logged_in');
		$courseID = $this->input->get('id', TRUE);
		$this->model_userCourse->DropFromCourse($session_data['userID'], $courseID);

		redirect('home', 'refresh');
	}
}
?>