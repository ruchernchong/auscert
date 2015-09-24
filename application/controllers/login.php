<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_user');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_groupCourse');
		$this->load->model('model_course');
		$this->load->model('model_group');
	}

	public function index() {
		$groups = $this->model_group->GetGroups();

		if ($groups) {
			$data['groups'] = $groups;
		}

		$this->load->view("view_login", $data);
	}

	//validate a user's login
	public function validateLogin() {
		$username = $this->input->post('loginUsername');
		$query = $this->model_user->validate();
		
		if ($query) {
			foreach($query as $row)
			{
				$sess_array = array(
					'userID' => $row->userID, 
					'username' => $row->username, 
					'email' => $row->email, 
					'usertype' => $row->userType
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			redirect('home', 'refresh');
		} else {
			redirect('login','refresh');
		}
	}
}
?>