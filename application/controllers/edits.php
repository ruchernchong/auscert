<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edits extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_slide');
		$this->load->model('model_question');
		$this->load->model('model_answer');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index() {
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "admin";

			$query = $this->model_course->GetCourseById($this->input->get('courseID'));

			if ($query) {
				$data['course'] = $query;
				$slides = $this->model_slide->GetSlidesByCourse($data['course']->courseID);
				$questions = $this->model_question->GetQuestions($data['course']->courseID);
			}

			//List of slides for each chapter in a course
			if ($slides) {
				$data['slides'] = $slides;
			} else {
				$data['slides'] = array();
			}

			//List of questions
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
			
			// If user is not admin, redirect to dashboard.
			if ($data['usertype'] != "admin") {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {
				$this->load->view('header', $data);
				$this->load->view('view_editCourse');
			}
		} else {
			redirect('login', 'refresh');
		}
	}
	
	// Updates the description for a course and saves slides, quiz questions and quiz answers.
	// Deletes any excess content if the user has removed content
	public function save() {
		$courseID = $this->input->get('courseID');
		$courseName = $this->input->post('courseName');
		$courseCategory = $this->input->post('courseCategory');
		$courseDescription = $this->input->post('courseDescription');

		$this->model_course->UpdateCourse($courseID, $courseName, $courseCategory, $courseDescription);
		
		$slideOrder = 0;
		while (true) {
			$slideTitle = $this->input->post(sprintf('title_%d', $slideOrder));
			$slideContent = $this->input->post(sprintf('editor_%d', $slideOrder));
			
			if ($slideTitle == NULL) {
				break;
			}

			$this->model_slide->SaveSlide($courseID, $slideOrder, $slideTitle, $slideContent);
			$slideOrder++;
		}
		$this->model_slide->DeleteHigherSlides($courseID, $slideOrder);

		$questionOrder = 0;
		while (true) {
			$questionText = $this->input->post(sprintf('question_%d', $questionOrder));
			
			if ($questionText == NULL) {
				break;
			}

			$this->model_question->SaveQuestion($courseID, $questionOrder, $questionText);
			
			$answerOrder = 0;
			while (true) {
				$answerText = $this->input->post(sprintf('q%da%d', $questionOrder, $answerOrder));
				
				if ($answerText == NULL) {
					break;
				}
	
				$this->model_answer->SaveAnswer($courseID, $questionOrder, $answerOrder, $answerText);
				$answerOrder++;
			}
			$this->model_answer->DeleteHigherAnswers($courseID, $questionOrder, $answerOrder);
			
			$questionOrder++;
		}
		$this->model_question->DeleteHigherQuestions($courseID, $questionOrder);
		
		redirect('admin','refresh');
	}
}
?>