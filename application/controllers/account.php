<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_user');
	}

	public function index() {
		$session_data = $this->session->userdata('logged_in');
		$data['userID'] = $session_data['userID'];
		$data['fname'] = $session_data['lname'];
		$data['lname'] = $session_data['lname'];
		$data['usertype'] = $session_data['usertype'];
		$data['email'] = $session_data['email'];
		$data['menu'] = "account";

		$this->load->view('header', $data);
		$this->load->view('view_account');
	}
}