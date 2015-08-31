<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class addCourse extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
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
			redirect('login', 'refresh');
		}
	}

	public function createCourse() {
		$courseName = $this->input->post('courseName');
		$courseCategory = $this->input->post('courseCategory');
		$courseDescription = $this->input->post('courseDescription');

		$courseID = $this->model_course->AddCourse($courseName, $courseCategory, 0, $courseDescription);

		$this->session->set_flashdata('courseID', $courseID);
		redirect('admin','refresh');
	}
}
?>