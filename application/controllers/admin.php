<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_course');
		$this->load->model('model_user');
		$this->load->model('model_userCourse');
		$this->load->model('model_group');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "admin";
			
			$getAllCourses = $this->model_course->GetAllCourses();
			$getLastEdited = $this->model_course->GetCourseLastEdited();
			$getUsers = $this->model_user->GetUsers();

			if ($getAllCourses) {
				$data['courses'] = $getAllCourses;
			}

			if ($getLastEdited) {
				$data['courseLastEdited'] = $getLastEdited;
			}

			if ($getUsers) {
				$data['users'] = $getUsers;
			}

			if ($data['usertype'] != "admin") {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {

				$this->load->view('header',$data);
				$this->load->view('view_adminPage',$data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	// Delete a course
	function dropCourse() {
		$courseID = $this->input->get('id', TRUE);
		$this->model_course->DeleteCourse($courseID);
		redirect('admin', 'refresh');
	}

	function ifActive() {
		$courseID = $this->input->post('courseID');
		$courseIfActive = $this->model_course->ifActive($courseID);
	}

	function ifNotActive() {
		$courseID = $this->input->post('courseID');
		$courseIfNotActive = $this->model_course->ifNotActive($courseID);
	}
}	