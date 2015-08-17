<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('course_model');
		$this->load->model('user_model');
		$this->load->model('user_course_model');
	}
	public function index() {
		if($this->session->userdata('logged_in')) 
		{
			$query = $this->user_course_model->GetUserCourses();
			if ($query) {
				$data['user_courses'] = $query;
			}

			$count = $this->user_course_model->GetNumberOfCourses();
			if ($count) {
				$data['NoOfCourses'] = $count;
			}

			$session_data = $this->session->userdata('logged_in');
			$data['userID'] = $session_data['userID'];
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['email'] = $session_data['email'];
			$data['menu'] = "home";

			$this->load->view('header',$data);
			$this->load->view('view_dashboard');
			// $this->load->view("footer");
		} else {
			 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}

	function logout() {
		$this->session->unset_userdata('logged_in');
		redirect('home','refresh');
		session_destroy();
	}

	
	function myGrade() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "mygrade";

			$this->load->view('header',$data);
			$this->load->view('view_myGrade');
		} else {
			 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		} 

	}

	function admin() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "adminpage";
			
			$getCourse = $this->course_model->GetCourse();
			$getUsers = $this->user_model->GetUsers();

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
?>