<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageCourse extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('model_group');
		$this->load->model('model_course');
		$this->load->model('model_groupCourse');
	}

	function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = 'admin';

			$thisGroupID = $this->input->get('groupID');
			$thisGroup = $this->model_group->GetGroupByID($thisGroupID);
			$assignedCourses = $this->model_groupCourse->GetGroupCourses($thisGroupID);

			$omittedCourses = [];
			if (!empty($assignedCourses)) {
				foreach ($assignedCourses as $exceptCourse) {
					array_push($omittedCourses, $exceptCourse->courseID);
				}
				$otherCourses = $this->model_course->GetAllCoursesExcept($omittedCourses);
			}

			if ($thisGroup) {
				$data['thisGroup'] = $thisGroup;
			} else {
				$data['thisGroup'] = null;
			}

			if ($assignedCourses) {
				$data['assignedCourses'] = $assignedCourses;
			} else {
				$data['assignedCourses'] = null;
			}

			if (!empty($otherCourses)) {
				$data['otherCourses'] = $otherCourses;
			} else {
				$data['otherCourses'] = null;
			}

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
			$this->model_groupCourse->AddCourseToGroup($courseID, $groupID);
		}
//        $this->debug_to_console($_SERVER['REQUEST_URI']);
//        header("Location: " . $_SERVER['REQUEST_URI']);
<<<<<<< HEAD
        header('Location: http://localhost/auscert/manageCourse?groupID=1');
    }
=======
//        header('Location: http://localhost/auscert/manageCourse?groupID=1');
	}
>>>>>>> master

    //remove courses from a group
	function removeCourses() {
		$coursesArray = $this->input->post('courseIDs');
		$groupID = $this->input->post('groupID');

		foreach ($coursesArray as $courseID) {
			$this->model_groupCourse->RemoveCourseFromGroup($courseID, $groupID);
		}
	}

    //Helpful function for printing to console. Evoke with $this->debug_to_console(value);
<<<<<<< HEAD
    function debug_to_console( $data ) {
        if ( is_array( $data ) )
            $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
        echo $output;
    }
=======
	function debug_to_console( $data ) {
		if (is_array( $data ))
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

		echo $output;
	}
>>>>>>> master
}
?>
