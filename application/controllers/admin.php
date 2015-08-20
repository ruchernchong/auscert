<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct() {
		parent::__construct();
			$this->load->model('model_course');
			$this->load->model('model_user');
			$this->load->model('model_userCourse');
			$this->load->model('model_group');
	}

	function index() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "adminpage";
			
			$getCourse = $this->model_course->GetCourse();
			$getUsers = $this->model_user->GetUsers();

			if ($getCourse) {
				$data['courses'] = $getCourse;
			}

			if ($getUsers) {
				$data['users'] = $getUsers;
			}

			$this->load->view('header',$data);
			$this->load->view('view_adminPage',$data);
		} else {
		 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}
}	