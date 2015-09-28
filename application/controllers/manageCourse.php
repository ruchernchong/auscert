<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageCourse extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_group');
		$this->load->model('model_course');
		$this->load->model('model_groupcourse');
	}

	function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = 'admin';

			$thisGroupID = $this->input->get('groupID');
			$thisGroup = $this->model_group->GetGroupByID($thisGroupID);
			$assignedCourses = $this->model_groupcourse->GetGroupCourses($thisGroupID);

			$omittedCourses = [];

			if (!empty($assignedCourses)) {
				foreach ($assignedCourses as $exceptCourse) {
					array_push($omittedCourses, $exceptCourse->courseID);
				}
				$otherCourses = $this->model_course->GetAllCoursesExcept($omittedCourses);
			}

			//Gets the current group's object
			if ($thisGroup) {
				$data['thisGroup'] = $thisGroup;
			} else {
				$data['thisGroup'] = null;
			}

			//Gets the current group's assigned course
			if ($assignedCourses) {
				$data['assignedCourses'] = $assignedCourses;
			} else {
				$data['assignedCourses'] = null;
			}

			//Gets all the other courses not assigned to the current group
			if (!empty($otherCourses)) {
				$data['otherCourses'] = $otherCourses;
			} else {
				$data['otherCourses'] = $this->model_course->GetAllCourses();
			}

			//Validates that the user is an admin deny access otherwise
			if ($data['usertype'] != 'admin') {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {
				$this->load->view('header', $data);
				$this->load->view('view_manageCourse', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	//assign courses to a group
	function addCourses() {
		$coursesArray = $this->input->post('courseIDs');
		$groupID = $this->input->post('groupID');

		foreach ($coursesArray as $courseID) {
			$this->model_groupcourse->AddCourseToGroup($courseID, $groupID);
		}
	}

	//remove courses from a group
	function removeCourses() {
		$coursesArray = $this->input->post('courseIDs');
		$groupID = $this->input->post('groupID');
		foreach ($coursesArray as $courseID) {
			$this->model_groupcourse->RemoveCourseFromGroup($courseID, $groupID);
		}
	}

	//Helpful function for printing to console. Evoke with $this->debug_to_console(value);
	function debug_to_console($data) {
		if (is_array($data)) {
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		} else {
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

			echo $output;
		}
	}
}
?>
