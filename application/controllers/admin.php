<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_course');
		$this->load->model('model_user');
		$this->load->model('model_userCourse');
		$this->load->model('model_group');
		$this->load->model('model_userGroup');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "admin";

			$getAllCourses = $this->model_course->GetAllCourses();
			$getLastEdited = $this->model_course->GetCourseLastEdited();
			$users = $this->model_user->GetUsers();

			$usersAndGroups = [];

			foreach ($users as $user) {
				$userGroupList = ($this->model_userGroup->GetUserGroup($user->userID) ? $this->model_userGroup->GetUserGroup($user->userID) : "");
				$usersList = [
					"userName"=> $user->username ,
					"groupArray"=> $userGroupList,
					"email"=> $user->email,
					"contact"=> $user->contact,
					"userType"=> $user->userType
				];
				array_push($usersAndGroups, $usersList);
			}

			if ($getAllCourses) {
				$data['courses'] = $getAllCourses;
			}

			if ($getLastEdited) {
				$data['courseLastEdited'] = $getLastEdited;
			}

			if ($users) {
				$data['users'] = $users;
			}

			if ($usersAndGroups) {
				$data['usersAndGroups'] = $usersAndGroups;
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

	function getUserGroup($userID) {
		return $this->model_userGroups->GetUserGroups($userID);
	}

