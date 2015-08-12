<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('course_model');

	}
	public function index() {

		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "home";

			$this->load->view('header',$data);
			$this->load->view('dashboard');
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
			
			$query = $this->course_model->GetCourse();

			if ($query) {
				$data['lessons'] = $query;
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