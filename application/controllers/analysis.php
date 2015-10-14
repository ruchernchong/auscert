<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class analysis
 */
class analysis extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_user');
		$this->load->model('model_usercourse');
		$this->load->model('model_course');
		$this->load->model('model_group');
		$this->load->model('model_slide');
	}

	function _remap() {
		$courseID = $this->uri->segment(3);

		switch ($courseID) {
			case null:
			case false:
			case '':
				$this->index();
				break;
			default:
				show_404();
				break;
		}
	}

	function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['fname'] = $session_data['lname'];
			$data['lname'] = $session_data['lname'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "admin";

			$courseID = $this->uri->segment(2);

			$getCourse = $this->model_course->GetCourseByID($courseID);
			$getCourseUsers = $this->model_usercourse->GetUsersFromCourse($courseID);
			$getCompletedCourseUsers = $this->model_usercourse->GetCompletedUsers($courseID);

			if ($getCourse) {
				$data['course'] = $getCourse;
			}

			if ($getCourseUsers) {
				$data['courseUsers'] = $getCourseUsers;
			} else {
				$data['courseUsers'] = null;
			}

			if ($getCompletedCourseUsers) {
				$data['completedUsers'] = $getCompletedCourseUsers;
			} else {
				$data['completedUsers'] = null;
			}

			if ($data['usertype'] != "admin") {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {
				$this->load->view('header', $data);
				$this->load->view('view_analysis', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	//Delete a course
	function dropCourse() {
		$courseID = $this->input->get('id', TRUE);
		$this->model_course->DeleteCourse($courseID);

		redirect('admin', 'refresh');
	}
}