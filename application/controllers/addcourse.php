<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class addCourse extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_add_course');
	}

	public function index() {
		
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "adminpage";
			
			$this->load->view('header',$data);
			$this->load->view('view_addCourse');
		} else {
			 //If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}

	public function add_course() {
		$name = $this->input->post('name');
		$category = $this->input->post('category');
		$description = $this->input->post('description');

		$this->model_add_course->save_course($name, $category, 0, $description, 'text date? really?', 'today');
	}
}
?>