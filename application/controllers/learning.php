<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class learning extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_slide');
		$this->load->model('model_question');
		$this->load->model('model_answer');
		$this->load->model('model_userResult');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "course";
			
			$query = $this->model_course->GetCourseById($this->input->get('courseID'));

			if ($query) {
				$data['course'] = $query;
				$slides = $this->model_slide->GetSlidesByCourse($data['course']->courseID);
				$questions = $this->model_question->GetQuestions($data['course']->courseID);
			}

			if ($slides) {
				$data['slides'] = $slides;
			} else {
				$data['slides'] = array();
			}
			
			if ($questions) {
				$data['questions'] = $questions;
				for($i = 0; $i < sizeof($questions); $i++) {
					$answers = $this->model_answer->GetAnswers($data['course']->courseID, $questions[$i]->questionOrder);
					if ($answers) {
						$data['answers'][$questions[$i]->questionOrder] = $answers;
					} else {
						$data['answers'][$questions[$i]->questionOrder] = array();
					}
				}
			} else {
				$data['questions'] = array();
			}
			
			$this->load->view('header', $data);
			$this->load->view('view_learning', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function quiz() {
		$courseID = $this->input->get('courseID');
		$results = array();
		
		$i = 0;
		while ($this->input->post('q' . $i) != NULL) {
			array_push($results,  $this->input->post('q' . $i));
			$i++;
		}
		
		$this->model_userResult->SaveResults(
			$courseID,
			$this->session->userdata['logged_in']['userID'],
			$results
			);

		redirect('course', 'refresh');
	}
}
?>