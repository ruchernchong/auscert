<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('password');
		$this->load->helper(array('form', 'url'));

		$this->load->model('model_course');
		$this->load->model('model_group');
		$this->load->model('model_groupcourse');
		$this->load->model('model_user');
	}

	public function index() {
		$this->load->view('view_login');
	}

	//validate a user's login
	public function validateLogin() {
		$this->db->where('email', $this->input->post('loginEmail'));
		$query = $this->db->get('users');

		$row = $query->row();

		if ($this->password->validate_password($this->input->post('loginPassword'), $row->password)) {
			$session_array = array(
				'userID' => $row->userID,
				'fname' => $row->fname,
				'lname' => $row->lname,
				'email' => $row->email,
				'usertype' => $row->usertype
			);
			$this->session->set_userdata('logged_in', $session_array);

			redirect('home', 'refresh');
		} else {
			$this->session->set_flashdata('login-error', 'Invalid Email and/or Password.');
			redirect('login', 'refresh');
		}
	}
}
?>