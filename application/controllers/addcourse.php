<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class addCourse extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_addCourse');
	}

	public function index() {
		
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "admin";
			
			$this->load->view('header',$data);
			$this->load->view('view_addCourse');
		} else {
			 //If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function createCourse() {
		$courseName = $this->input->post('courseName');
		$courseCategory = $this->input->post('courseCategory');
		$courseDescription = $this->input->post('courseDescription');

		$this->model_addCourse->saveCourse($courseName, $courseCategory, 0, $courseDescription);

		redirect('admin#tab-courses','refresh');
	}
}
?>