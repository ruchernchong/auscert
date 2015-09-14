<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addCourse extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "admin";
			
			$this->load->view('header', $data);
			$this->load->view('view_addCourse');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function createCourse() {
		$rules = array(
			array(
				'field' => 'createCourseName',
				'label' => 'Course Name',
				'rules' => 'required|xss_clean'
				),
			array(
				'field' => 'createCourseCategory',
				'label' => 'Course Category',
				'rules' => 'required|xss_clean'
				),
			array(
				'field' => 'createCourseDescription',
				'label' => 'Description',
				'rules' => 'required|xss_clean'
				)
			);

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$createCourseName = $this->input->post('createCourseName');
			$createCourseCategory = $this->input->post('createCourseCategory');
			$createCourseDescription = $this->input->post('createCourseDescription');

			$courseID = $this->model_course->AddCourse($createCourseName, $createCourseCategory, 0, $createCourseDescription);

			$this->session->set_flashdata('courseID', $courseID);
			redirect('admin', 'refresh');
		} else {
			if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['usertype'] = $session_data['usertype'];
				$data['menu'] = "admin";

				$this->load->view('header', $data);
				$this->load->view('view_addCourse');
			}
		}
	}
}
?>