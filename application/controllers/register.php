<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_user');
		$this->load->library('form_validation');
		$this->load->model('model_groupcourse');
		$this->load->model('model_usergroup');
		$this->load->model('model_usercourse');
		$this->load->model('model_course');
		$this->load->model('model_group');
	}


	//Create user and assign him to groups
	public function registerUsers() {
		$rules = array(
			array(
				'field' => 'registerUsername',
				'label' => 'Username',
				'rules' => 'required|is_unique[users.username]|xss_clean'
			),
			array(
				'field' => 'registerPassword',
				'label' => 'Password',
				'rules' => 'required|matches[registerRepeatPassword]|xss_clean'
			),
			array(
				'field' => 'registerRepeatPassword',
				'label' => 'Confirm Password',
				'rules' => 'required|xss_clean'
			),
			array(
				'field' => 'registerGroup',
				'label' => 'Faculty',
				'rules' => 'required|xss_clean'
			),
			array(
				'field' => 'registerEmail',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[users.email]|xss_clean'
			),
			array(
				'field' => 'registerContact',
				'label' => 'Contact No.',
				'rules' => 'required|regex_match[/^[\d+ ]+$/]|xss_clean'
			)
		);

		$this->form_validation->set_rules($rules);

		$registerUsername = $this->input->post('registerUsername');
		$registerPassword = $this->input->post('registerPassword');
		$registerGroup = $this->input->post('registerGroup');
		$registerEmail = $this->input->post('registerEmail');
		$registerContact = $this->input->post('registerContact');

		if ($this->form_validation->run() == false) {
			echo "<script>alert('Error registering. Please see register form for errors.');</script>";
		} else {
			$this->registerAndSetup($registerUsername, $registerPassword, $registerGroup, $registerEmail, $registerContact);
			echo "<script>alert('Successfully registered. Please proceed to login.');</script>";
			$this->load->view('view_login');
		}
	}

	//Adds user to the default AllUser group in addition to their specialised groups.
	//Also assigns courses to them based on their grouping
	function registerAndSetup($registerUsername, $registerPassword, $registerGroup, $registerEmail, $registerContact) {
		$thisUserID = $this->model_user->registerUsers($registerUsername, $registerPassword, $registerEmail, $registerContact);

		//Default AllUser group and courses
		$defaultGroupID = "1";
		$this->model_usergroup->AddUserToGroup($thisUserID, $defaultGroupID); //Assign user to default AllUsers group
		$thisCourses = $this->model_groupcourse->GetGroupCourses($defaultGroupID);//Get all the default courses
		foreach ($thisCourses as $thisCourse) {
			$this->model_usercourse->RegisterToCourse($thisUserID, $thisCourse->courseID);
		}

		//Handle the additional groups and courses
		if (!in_array("not_applicable", $registerGroup)) { //checks to ensure the Not Applicable field is not selected
			$this->debug_to_console("Entered!");
			foreach ($registerGroup as $thisGroupID) {
				$this->model_usergroup->AddUserToGroup($thisUserID, $thisGroupID); //Assign user to the group
				$thisCourses = $this->model_groupcourse->GetGroupCourses($thisGroupID);//Get all the courses
				foreach ($thisCourses as $thisCourse) {
					//check if course not yet assigned yet. Do nothing if course already assigned
					if (!$this->model_usercourse->CourseAlreadyAssigned($thisUserID, $thisCourse->courseID)) {
						$this->model_usercourse->RegisterToCourse($thisUserID, $thisCourse->courseID);
					}
				}
			}
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