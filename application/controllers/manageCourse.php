<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class manageCourse
 */
class manageCourse extends CI_Controller {
	function __construct() {
		parent::__construct();
		

		$this->load->model(
			array(
				'model_course', 'model_group', 'model_groupcourse'
			)
		);
	}

	function _remap() {
	/**
	 *
	 */
		$method = $this->uri->segment(2);

		switch($method){
			case null:
			case false:
			case is_numeric($method):
				$this->index();
				break;
			case 'addCourses':
				$this->addCourses();
				break;
			case 'removeCourses':
				$this->removeCourses();
				break;
			default:
				show_404();
				break;
		}
	}

	function index() {
	/**
	 *
	 */
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['fname'] = $session_data['fname'];
			$data['lname'] = $session_data['lname'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = 'admin';

			$groupID = $this->uri->segment(2);

			$thisGroupID = $groupID;
			$thisGroup = $this->model_group->GetGroupByID($thisGroupID);
			$assignedCourses = $this->model_groupcourse->GetGroupCourses($thisGroupID);

			$omittedCourses = [];

			if (!empty($assignedCourses)) {
				foreach ($assignedCourses as $assignedCourse) {
					array_push($omittedCourses, $assignedCourse->courseID); //push in all the courses to be omitted
				}
				$otherCourses = $this->model_course->GetAllCoursesExcept($omittedCourses);
			}
			else {
				$otherCourses = $this->model_course->GetAllCourses();
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
				$data['otherCourses'] = null;
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
	/**
	 * Assigns courses to a group
	 */
		$coursesArray = $this->input->post('courseIDs');
		$groupID = $this->input->post('groupID');

		foreach ($coursesArray as $courseID) {
			$this->model_groupcourse->AddCourseToGroup($courseID, $groupID);
		}
	}

	//remove courses from a group
	function removeCourses() {
	/**
	 * Removes courses from a group
	 */
		$coursesArray = $this->input->post('courseIDs');
		$groupID = $this->input->post('groupID');
		foreach ($coursesArray as $courseID) {
			$this->model_groupcourse->RemoveCourseFromGroup($courseID, $groupID);
		}
	}

//	//Ajax search left table
//	function searchLeftTable() {
//		$searchTerm = $this->input->post('leftTableSearch');
//	}
//
//	//Ajax search right table
//	function searchRightTable() {
//		$searchTerm = $this->input->post('leftTableSearch');
//	}

	//Helpful function for printing to console. Evoke with $this->debugConsole(value);
	function debugConsole($data) {
	/**
	 * Helpful function for printing to console. Evoke with $this->debugConsole(value);
	 * @param $data
	 */
		if (is_array($data)) {
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		} else {
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

			echo $output;
		}
	}
}
?>
