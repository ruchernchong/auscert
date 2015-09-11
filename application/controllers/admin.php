<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_user');
		$this->load->model('model_userCourse');
		$this->load->model('model_group');
		$this->load->model('model_userGroup');
	}

	function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = 'admin';

			$allCourses = $this->model_course->GetAllCourses();
			$lastEdited = $this->model_course->GetCourseLastEdited();
			$users = $this->model_user->GetUsers();
			$groups = $this->model_group->GetGroups();

			//User list with associated array of groups
			$usersAndGroups = [];
			foreach ($users as $user) {
				$groupArray = (!empty($this->model_userGroup->GetUserGroups($user->userID)) ? $this->model_userGroup->GetUserGroups($user->userID) : '');
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
				$userArray = (!empty($this->model_userGroup->GetGroupUsers($group->groupID)) ? $this->model_userGroup->GetGroupUsers($group->groupID) : '');
				$userCount = (($this->model_userGroup->GetUserCount($group->groupID) != "") ? $this->model_userGroup->GetUserCount($group->groupID) : "No Members");
				$groupList = [
					'groupID' => $group->groupID,
					'organisation' => $group->organisation,
					'userArray' => $userArray,
					'userCount' => $userCount
				];
				array_push($groupsAndUsers, $groupList);
			}

			if ($allCourses) {
				$data['courses'] = $allCourses;
			}

			if ($lastEdited) {
				$data['courseLastEdited'] = $lastEdited;
			}

			if ($usersAndGroups) {
				$data['users'] = $usersAndGroups;
			}

			if ($groupsAndUsers) {
				$data['groups'] = $groupsAndUsers;
			}

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
	function dropCourse()
	{
		$courseID = $this->input->get('id', TRUE);
		$this->model_course->DeleteCourse($courseID);
		redirect('admin', 'refresh');
	}

	function ifActive()
	{
		$courseID = $this->input->post('courseID');
		$this->model_course->ActivateCourse($courseID);
	}

	function ifNotActive()
	{
		$courseID = $this->input->post('courseID');
		$this->model_course->DeactivateCourse($courseID);
	}
}

