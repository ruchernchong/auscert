<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->library(
			array(
				'form_validation',
				'password'
			));
		$this->load->helper(
			array(
				'form',
				'html',
				'url'
			));

		$this->load->model('model_course');
		$this->load->model('model_group');
		$this->load->model('model_groupcourse');
		$this->load->model('model_user');
	}

	public function index() {
		if ($this->session->userdata('logged_in')) {
			redirect('home', 'refresh');
		} else {
			$this->load->view('view_login');
		}
	}


	/**
	 * Validate a user's login
	 */
	public function validateLogin() {
		$loginEmail = $this->input->post('loginEmail');
		$loginPassword = $this->input->post('loginPassword');

		$this->db->where('email', $loginEmail);
		$query = $this->db->get('users');

		$row = $query->row();

		if ($this->password->validate_password($loginPassword, $row->password)) {
			$session_array = array(
				'userID' => $row->userID,
				'fname' => $row->fname,
				'lname' => $row->lname,
				'email' => $row->email,
				'usertype' => $row->usertype
			);

			if ($row->activated == 1) {
				$this->session->set_userdata('logged_in', $session_array);

				$this->session->set_flashdata('login-success',
					'Welcome back to AusCert, ' . $row->fname . '!');
				redirect('home', 'refresh');
			} else if ($row->activated == 0) {
				$this->session->set_flashdata('email-not-verified',
					'Your email: ' . $loginEmail . ' is not activated.'
					. br(1) .
					'You are required to activate your email before logging in.');
				redirect('login', 'refresh');
			}
		} else {
			$this->session->set_flashdata('login-error',
				'Invalid Email and/or Password.');
			redirect('login', 'refresh');
		}
	}
}
?>