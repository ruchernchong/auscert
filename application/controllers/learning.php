<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class learning extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_slide');
		$this->load->model('model_question');
		$this->load->model('model_answer');
		$this->load->model('model_userresult');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	function _remap() {
		$method = $this->uri->segment(2);

		switch ($method) {
			case null:
			case false:
			case is_numeric($method):
				$this->index();
				break;
			case 'quiz':
				$this->quiz($this->uri->segment(3));
				break;
			default:
				show_404();
				break;
		}
	}

	public function index() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			//$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "course";

			$courseID = $this->uri->segment(2);
			
			$query = $this->model_course->GetCourseById($courseID);

			if ($query) {
				$data['course'] = $query;
//				$slides = $this->model_slide->GetSlidesByCourse($data['course']->courseID);
//				$questions = $this->model_question->GetQuestions($data['course']->courseID);
				$slides = $this->model_slide->GetSlidesByCourse($courseID);
				$questions = $this->model_question->GetQuestions($courseID);
			}

			if ($slides) {
				$data['slides'] = $slides;
			} else {
				$data['slides'] = array();
			}
			
			if ($questions) {
				$data['questions'] = $questions;
				for($i = 0; $i < sizeof($questions); $i++) {
//					$answers = $this->model_answer->GetAnswers($data['course']->courseID, $questions[$i]->questionOrder);
					$answers = $this->model_answer->GetAnswers($courseID, $questions[$i]->questionOrder);
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

	public function quiz($courseID) {
		$course = $this->model_course->GetCourseById($courseID);
		$results = array();
		
		$i = 0;
		while ($this->input->post('q' . $i) != NULL) {
			array_push($results,  $this->input->post('q' . $i));
			$i++;
		}
		
		$this->model_userresult->SaveResults(
			$courseID,
			$course->version,
			$this->session->userdata['logged_in']['userID'],
			$results
			);

		redirect('course', 'refresh');
	}
}
?>