<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class learning extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_slide');
		$this->load->model('model_question');
		$this->load->model('model_answer');
		$this->load->model('model_userresult');
		$this->load->model('model_usercourse');
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

			$data['completed'] = $this->model_usercourse->CourseCompleted($courseID, $this->session->userdata['logged_in']['userID']);
			
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

		$this->score_latest_quiz($courseID, $this->session->userdata['logged_in']['userID']);

		redirect('home', 'refresh');
	}


	public function score_latest_quiz($courseID, $userID) {
		$answers = $this->model_answer->GetCorrectAnswers($courseID);
		$results = $this->model_userresult->GetLatestResults($courseID, $userID);

		$correct = 0;

		foreach ($results->result() as &$value) {

			if($value->userAnswer == $answers[$value->questionOrder]) {
				$correct ++;
			}
		}
		$grade = $correct / $results->num_rows;

		$this->model_usercourse->UpdateScore($courseID, $userID,  $grade);

		$course = $this->model_course->GetCourseById($courseID);

		if($grade * 100 >= $course->passPercentage + 0.001) {
			// quiz passed, add small value to allow for float inaccuracy
			$this->model_usercourse->UpdateStatus($courseID, $userID, 4);
		} else {
			//quiz failed
			$this->model_usercourse->UpdateStatus($courseID, $userID, 3);
		}

	}
}
?>