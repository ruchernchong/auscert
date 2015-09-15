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

			//List of courses the user is enrolled in
			$userCourses = $this->model_userCourse->GetUserCourses();
			if ($userCourses) {
				$data['userCourses'] = $userCourses;
			}

			//Count of courses the user is enrolled in
			$count = $this->model_userCourse->GetNumberOfUserCourses();
			if ($count) {
				$data['NoOfUserCourses'] = $count;
			}

			//Count of the total nunmber of courses
			$count = $this->model_course->GetNumberOfCourses();
			if ($count) {
				$data['NoOfCourses'] = $count;
			}

			//Count of the number of groups in the system
			$count = $this->model_group->GetNumberofGroups();
			if ($count) {
				$data['NoOfGroups'] = $count;
			}

			//List of groups in the system
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

			//List of courses completed by a user, null if there is none
			$query = $this->model_userCourse->GetCompletedUserCourse($data['userID']);
			if ($query) {
				$data['completedUserCourses'] = $query;
			} else {
				$data['completedUserCourses'] = null;
			}

			$this->load->view('header', $data);
			$this->load->view('view_dashboard');
			// $this->load->view("footer");
		} else {
			 //If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	//Enrol a user to a course
	function EnrolToCourse() {
		$session_data = $this->session->userdata('logged_in');
		$courseID = $this->input->get('id', TRUE);
		$this->model_userCourse->RegisterToCourse($session_data['userID'], $courseID);

		redirect('home', 'refresh');
	}

	//Drop a user from a course
	function dropCourse() {
		$session_data = $this->session->userdata('logged_in');
		$courseID = $this->input->get('id', TRUE);
		$this->model_userCourse->DropFromCourse($session_data['userID'], $courseID);

		redirect('home', 'refresh');
	}
}
?>