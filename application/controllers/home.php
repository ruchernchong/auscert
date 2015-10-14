<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class home
 */
class home extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model(
			array(
				'model_course', 'model_group', 'model_user', 'model_usercourse'
			)
		);
	}

	/**
	 *
	 */
	public function index() {
		if ($this->session->userdata('logged_in')) {
			$thisUserID = $this->session->userdata('logged_in')['userID'];

			$courses = $this->model_course->GetAllCourses();
			$userCourses = $this->model_usercourse->GetUserCourses($thisUserID);

			if ($courses) {
				$coursesAvail = array_udiff($courses, $userCourses, function ($courses, $userCourses) {
					return $courses->courseID - $userCourses->courseID;
				});

				$data['courses'] = $courses;
				$data['coursesAvail'] = $coursesAvail;
				$data['count_coursesAvail'] = count($coursesAvail);
			}

			//List of courses the user is enrolled in
			if ($userCourses) {
				$data['userCourses'] = $userCourses;
			}

			//Count of courses the user is enrolled in
			$count = $this->model_usercourse->GetNumberOfUserCourses();
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
			$data['fname'] = $session_data['fname'];
			$data['lname'] = $session_data['lname'];
			$data['usertype'] = $session_data['usertype'];
			$data['email'] = $session_data['email'];
			$data['menu'] = "home";

			//List of courses completed by a user, null if there is none
			$query = $this->model_usercourse->GetCompletedUserCourse($data['userID']);
			if ($query) {
				$data['completedUserCourses'] = $query;
			} else {
				$data['completedUserCourses'] = null;
			}

			$this->load->view('header', $data);
			$this->load->view('view_dashboard');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	/**
	 * Enrol a user to a course
	 */
	public function EnrolToCourse() {
		$session_data = $this->session->userdata('logged_in');

		$courseID = $this->uri->segment(2);
		$this->model_usercourse->RegisterToCourse($session_data['userID'], $courseID);

		redirect('home', 'refresh');
	}

	/**
	 * Drop a user from a course
	 */
	public function dropCourse() {
		$session_data = $this->session->userdata('logged_in');

		$courseID = $this->uri->segment(2);
		$this->model_usercourse->DropFromCourse($session_data['userID'], $courseID);

		redirect('home', 'refresh');
	}
}
?>