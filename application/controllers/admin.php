<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_user');
		$this->load->model('model_usercourse');
		$this->load->model('model_group');
		$this->load->model('model_usergroup');
	}

	function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = 'admin';

			$allCourses = $this->model_course->GetAllCourses();
			$lastEdited = $this->model_course->GetCourseLastEdited();
			$users = $this->model_user->GetAllUsers();
			$groups = $this->model_group->GetGroups();

			//User list with associated array of groups
			$usersAndGroups = [];
			foreach ($users as $user) {
				$groupArray = (!empty($this->model_usergroup->GetUserGroups($user->userID)) ? $this->model_usergroup->GetUserGroups($user->userID) : '');
				$usersList = [
				'userName' => $user->username,
				'groupArray' => $groupArray,
				'email' => $user->email,
				'contact' => $user->contact,
				'userType' => $user->userType
				];
				array_push($usersAndGroups, $usersList);
			}

			//Group list with associated array of users
			$groupsAndUsers = [];
			foreach ($groups as $group) {
				$userArray = (!empty($this->model_usergroup->GetGroupUsers($group->groupID)) ? $this->model_usergroup->GetGroupUsers($group->groupID) : '');
				$userCount = (($this->model_usergroup->GetUserCount($group->groupID) != "") ? $this->model_usergroup->GetUserCount($group->groupID) : "No Members");
				$groupList = [
				'groupID' => $group->groupID,
				'organisation' => $group->organisation,
				'userArray' => $userArray,
				'userCount' => $userCount
				];
				array_push($groupsAndUsers, $groupList);
			}

			//List of all courses
			if ($allCourses) {
				$data['courses'] = $allCourses;
			}

			//Last edited course
			if ($lastEdited) {
				$data['courseLastEdited'] = $lastEdited;
			}

			//List of users and the groups they belong to
			if ($usersAndGroups) {
				$data['users'] = $usersAndGroups;
			}

			//List of groups and the users assigned to them
			if ($groupsAndUsers) {
				$data['groups'] = $groupsAndUsers;
			}

			//Validates user to be admin in order for access
			if ($data['usertype'] != 'admin') {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {
				$this->load->view('header', $data);
				$this->load->view('view_adminPage', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	// Delete a course
	function dropCourse() {
		$courseID = $this->uri->segment(3);
		$this->model_course->DeleteCourse($courseID);
		redirect('admin', 'refresh');
	}

	function dropGroup() {
		$groupID = $this->uri->segment(3);
		$this->model_group->DeleteGroup($groupID);
		redirect('admin', 'refresh');
	}

	//Activate a course if checkbox is ticked
	function ifActive() {
		$courseID = $this->input->post('courseID');
		$this->model_course->ActivateCourse($courseID);
	}

	//Deactivate a course if checkbox is ticked
	function ifNotActive() {
		$courseID = $this->input->post('courseID');
		$this->model_course->DeactivateCourse($courseID);
	}

	//AJAX search for courses
	function searchUser() {
		$searchTerm = $this->input->post('userSearch');
		$query = $this->model_user->GetUserByName($searchTerm);
		echo json_encode($query);
	}
}