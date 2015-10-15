<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class admin
 */
class admin extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model(
			array(
				'model_course', 'model_group', 'model_user', 'model_usercourse', 'model_usergroup'
			)
		);
	}

	/**
	 *
	 */
	public function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['fname'] = $session_data['fname'];
			$data['lname'] = $session_data['lname'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = 'admin';

			$allCourses = $this->model_course->GetAllCourses();
			$lastEdited = $this->model_course->GetCourseLastEdited();
			$users = $this->model_user->GetAllUsers();
			$groups = $this->model_group->GetGroups();

			/**
			 * User list with associated array of groups
			 */
			$usersAndGroups = [];
			foreach ($users as $user) {
				$groupArray = (!empty($this->model_usergroup->GetUserGroups($user->userID)) ? $this->model_usergroup->GetUserGroups($user->userID) : '');
				$usersList = [
//				'studentID' => $user->studentID,
					'groupArray' => $groupArray,
					'userID' => $user->userID,
					'fname' => $user->fname,
					'lname' => $user->lname,
					'email' => $user->email,
					'contact' => $user->contact,
					'usertype' => $user->usertype
				];
				array_push($usersAndGroups, $usersList);
			}

			/**
			 * Group list with associated array of users
			 */
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

			/**
			 * List of all courses
			 */
			if ($allCourses) {
				$data['courses'] = $allCourses;
			}

			/**
			 * Last edited course
			 */
			if ($lastEdited) {
				$data['courseLastEdited'] = $lastEdited;
			}

			/**
			 * List of users and the groups they belong to
			 */
			if ($usersAndGroups) {
				$data['users'] = $usersAndGroups;
			}

			/**
			 * List of groups and the users assigned to them
			 */
			if ($groupsAndUsers) {
				$data['groups'] = $groupsAndUsers;
			}

			/**
			 * Validates user to be admin in order for access
			 */
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

	/**
	 * Delete a course
	 */
	public function dropCourse() {
		$courseID = $this->uri->segment(3);
		$this->model_course->DeleteCourse($courseID);
		redirect('admin', 'refresh');
	}

	/**
	 *
	 */
	public function dropGroup() {
		$groupID = $this->uri->segment(3);
		$this->model_group->DeleteGroup($groupID);
		redirect('admin', 'refresh');
	}

	/**
	 * Activate a course if checkbox is ticked.
	 */
	public function ifActive() {
		$courseID = $this->input->post('courseID');
		$this->model_course->ActivateCourse($courseID);
	}

	/**
	 * Deactivate a course if checkbox is unticked.
	 */
	public function ifNotActive() {
		$courseID = $this->input->post('courseID');
		$this->model_course->DeactivateCourse($courseID);
	}

	/*
	 * AJAX search for users
	 */
	public function searchUser()
	{
		$searchTerm = $this->input->post('userSearch');
		$users = $this->model_user->GetUserByName($searchTerm);

		if ($users) {
			$noResult = false;
			$usersAndGroups = [];

			foreach ($users as $user) {
				$groupArray = (!empty($this->model_usergroup->GetUserGroups($user->userID)) ? $this->model_usergroup->GetUserGroups($user->userID) : '');
				$usersList = [
//				'studentID' => $user->studentID,
					'groupArray' => $groupArray,
					'userID' => $user->userID,
					'fname' => $user->fname,
					'lname' => $user->lname,
					'email' => $user->email,
					'contact' => $user->contact,
					'usertype' => $user->usertype
				];
				array_push($usersAndGroups, $usersList);
			}
			$data2['users'] = $usersAndGroups;
			$payload = array(
				'html' => $this->load->view("ajaxPayload", $data2, true),
				'noResult' => $noResult
			);
		}
		else {
			$noResult = true;
			$payload = array(
				'noResult' => $noResult
			);
		}

		echo json_encode($payload);
	}
}