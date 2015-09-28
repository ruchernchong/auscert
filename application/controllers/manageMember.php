<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageMember extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_user');
		$this->load->model('model_group');
		$this->load->model('model_usergroup');
	}

	function _remap(){
		$method = $this->uri->segment(2);

		switch ($method) {
			case null:
			case false:
			case is_numeric($method):
				$this->index();
				break;
			case 'addMembers':
				$this->addMembers();
				break;
			case 'removeMembers':
				$this->removeMembers();
				break;
			default:
				show_404();
				break;
		}
	}

	function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = 'admin';

			$groupID = $this->uri->segment(2);

			$thisGroupID = $groupID;
			$thisGroup = $this->model_group->GetGroupByID($thisGroupID);
			$groupUsers = $this->model_usergroup->GetGroupUsers($thisGroupID);

			//Get all users who are not assigned to the current group
			$omittedUsers = [];
			if (!empty($groupUsers)) {
				foreach ($groupUsers as $groupUser) {
					array_push($omittedUsers, $groupUser['userID']);
				}
				$otherUsers = $this->model_user->GetAllUsersExcept($omittedUsers);
			}

			//Get the current group object
			if ($thisGroup) {
				$data['thisGroup'] = $thisGroup;
			} else {
				$data['thisGroup'] = null;
			}

			//Get all users assigned to the current group
			if ($groupUsers) {
				$data['groupUsers'] = $groupUsers;
			} else {
				$data['groupUsers'] = null;
			}

			//Get all users not assigned to the current group
			if (!empty($otherUsers)) {
				$data['otherUsers'] = $otherUsers;
			} else {
				$data['otherUsers'] = $this->model_user->GetAllUsers();
			}

			//Verify that the user is an admin. Deny access otherwise
			if ($data['usertype'] != 'admin') {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {
				$this->load->view('header', $data);
				$this->load->view('view_manageMember', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

    //assign users to a group
	function addMembers() {
		$usersArray = $this->input->post('userIDs');
		$groupID = $this->uri->segment(2);

		foreach ($usersArray as $userID) {
			$this->model_usergroup->AddUserToGroup($userID, $groupID);
		}
	}

    //remove users from a group
	function removeMembers() {
		$usersArray = $this->input->post('userIDs');
		$groupID = $this->uri->segment(2);

		foreach ($usersArray as $userID) {
			$this->model_usergroup->RemoveUserFromGroup($userID, $groupID);
		}
	}

    //Helpful function for printing to console. Evoke with $this->debugConsole(value);
	function debug($data) {
		if (is_array($data)) {
			$output = "<script>console.log('Debug Objects: " . implode( ',', $data) . "');</script>";
		} else {
			$output = "<script>console.log('Debug Objects: " . $data . "');</script>";
		}
		echo $output;
	}
}
?>