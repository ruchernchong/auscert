<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class register
 */
class register extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->helper('html');
		$this->load->library(
			array(
				'encrypt', 'form_validation', 'password', 'email'
			)
		);
		$this->load->model(
			array(
				'model_groupcourse', 'model_usergroup', 'model_usercourse', 'model_course', 'model_group', 'model_user'
			)
		);
	}

	public function index() {
		$groups = $this->model_group->GetPublicGroups();

		if ($groups) {
			$data['groups'] = $groups;
		}

		$this->load->view('view_register', $data);
	}

	/**
	 * Creates user and assigns the person to groups
	 */
	public function registerUsers() {
		$groups = $this->model_group->GetPublicGroups();

		if ($groups) {
			$data['groups'] = $groups;
		}

		$rules = array(
			array(
				'field' => 'registerEmail',
				'label' => 'Email Address',
				'rules' => 'required|valid_email|is_unique[users.email]|xss_clean'
			),
			array(
				'field' => 'registerFName',
				'label' => 'First Name',
				'rules' => 'required|xss_clean'
			),
			array(
				'field' => 'registerLName',
				'label' => 'Last Name',
				'rules' => 'required|xss_clean'
			),
			array(
				'field' => 'registerPassword',
				'label' => 'Password',
				'rules' => 'required|matches[registerRepeatPassword]|min_length[8]|callback_isStrongPassword|xss_clean'
			),
			array(
				'field' => 'registerRepeatPassword',
				'label' => 'Confirm Password',
				'rules' => 'required|matches[registerPassword]|min_length[8]|xss_clean'
			),
			array(
				'field' => 'registerGroup',
				'label' => 'Select Faculty',
				'rules' => 'required|xss_clean'
			),
			array(
				'field' => 'registerContact',
				'label' => 'Contact No.',
				'rules' => 'required|regex_match[/^[\d+ ]+$/]|xss_clean'
			)
		);

		$this->form_validation->set_rules($rules);

		$registerEmail = $this->input->post('registerEmail');
		$registerPassword = $this->password->create_hash($this->input->post('registerPassword'));
		$registerFName = $this->input->post('registerFName');
		$registerLName = $this->input->post('registerLName');
		$registerGroup = $this->input->post('registerGroup');
		$registerContact = $this->input->post('registerContact');

		$enc_email = $this->encrypt->encode($registerEmail);
		$registerActivationKey = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_email);

		if ($this->form_validation->run() == false) {
//			$this->form_validation->set_error_delimiters('', '');
			$this->session->set_flashdata('register-error', 'Please see registration form for errors.');

			$this->load->view('view_register', $data);
		} else {
			$data = array(
				'email' => $registerEmail,
				'password' => $registerPassword,
				'fname' => $registerFName,
				'lname' => $registerLName,
				'group' => $registerGroup,
				'contact' => $registerContact
			);

			if ($this->registerAndSetup($registerEmail, $registerPassword, $registerFName, $registerLName, $registerGroup, $registerContact, $registerActivationKey)) {
				if ($this->model_user->VerifyEmail($registerActivationKey)) {
					$this->session->set_flashdata('register-success', 'We have sent ' . $registerEmail . ' instructions to activate your account.'
						. br(1) .
						'You will have limited access until you have verified your email address.');

					redirect('login', 'refresh');
				}
			}
		}
	}

	/**
	 * Verify if the activation key sent to email matches with the one stored in the database tied to user's email address
	 */
	public function verify() {
		$hash = $this->uri->segment(3);

		if ($this->model_user->VerifyEmailID($hash)) {
			$this->session->set_flashdata('email-verified', 'Your email is successfully verified.'
				. br(1) .
				'You may now proceed to login.'
			);

			redirect('login', 'refresh');
		} else {
			$this->session->set_flashdata('email-not-verified', 'Sorry! There was an error verifying your email address.'
				.br(1).
				'Please contact registration@ruchern.com.');
		}
	}

	/**
	 * Using Regular Expressions (Regex method) to enforce a strong password policy
	 * Password must have at least one alphabet and one number, or one alphabet and one symbol
	 * @param $password
	 * @return bool
	 */
	public function isStrongPassword($password) {
		if (preg_match('/^(.*[a-zA-Z])(.*\d)$/', $password) || preg_match('/^(.*[a-zA-Z])(.*[$@$!%*#?&])$/', $password)) {
			return true;
		} else {
			$this->form_validation->set_message('isStrongPassword',
				'The %s field requires at least one number or symbol.');
			return false;
		}
	}

	/**
	 *
	 * Adds user to the default AllUser group in addition to their specialised groups
	 * Also assigns courses to them based on their grouping
	 * @param $registerEmail
	 * @param $registerPassword
	 * @param $registerFName
	 * @param $registerLName
	 * @param $registerGroup
	 * @param $registerContact
	 * @param $registerActivationKey
	 * @return bool
	 */
		$thisUserID = $this->model_user->registerUsers($registerEmail, $registerPassword, $registerFName, $registerLName, $registerContact, $registerActivationKey);

		//Default AllUser group and courses
		$defaultGroupID = "1";
		$this->model_usergroup->AddUserToGroup($thisUserID, $defaultGroupID); //Assign user to default AllUsers group
		$thisCourses = $this->model_groupcourse->GetGroupCourses($defaultGroupID);//Get all the default courses

		foreach ($thisCourses as $thisCourse) {
			$this->model_usercourse->RegisterToCourse($thisUserID, $thisCourse->courseID);

		}

		//Handle the additional groups and courses
		if (!in_array("not_applicable", $registerGroup)) { //checks to ensure the Not Applicable field is not selected
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
		return true;
	}

	/**
	 * Helpful function for printing to console. Evoke with $this->debugConsole(value);
	 * @param $data
	 */
	function debugConsole($data) {
		if (is_array($data)) {
			$output = "<script>console.log('Debug Objects: " . implode(',', $data) . "');</script>";
		} else {
			$output = "<script>console.log('Debug Objects: " . $data . "');</script>";

			echo $output;
		}
	}
}
?>