<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class learning
 */
class learning extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->helper(
			array(
				'form', 'url'
			)
		);
		$this->load->library('form_validation');
		$this->load->model(
			array(
				'model_answer', 'model_course',  'model_question', 'model_quizattempt', 'model_slide', 'model_usercourse', 'model_userresult'
			)
		);
	}

	/**
	 *
	 */
	public function _remap() {
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

	/**
	 *
	 */
	public function index() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "course";

			$courseID = $this->uri->segment(2);

			$data['completed'] = $this->model_usercourse->CourseCompleted($courseID, $this->session->userdata['logged_in']['userID']);
			
			$query = $this->model_course->GetCourseById($courseID);

			if ($query) {
				$data['course'] = $query;
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

	/**
	 * @param $courseID
	 */
	public function quiz($courseID) {
		$course = $this->model_course->GetCourseById($courseID);
		$userID = $this->session->userdata['logged_in']['userID'];

		$attempt = $this->model_quizattempt->SaveAttempt(
			$courseID,
			$userID,
			$course->version
		);

		$results = array();

		$i = 0;
		while ($this->input->post('q' . $i) != NULL) {
			$results[$i] = $this->input->post('q' . $i);
			$i++;
		}

		$this->model_userresult->SaveResults(
			$courseID,
			$userID,
			$attempt,
			$results
		);

		$this->score_latest_quiz($courseID, $userID);

		redirect('home', 'refresh');
	}

	/**
	 * @param $courseID
	 * @param $userID
	 */
	public function score_latest_quiz($courseID, $userID) {
		$answers = $this->model_answer->GetCorrectAnswers($courseID);
		$attempt = $this->model_quizattempt->GetLatestAttemptNumber($courseID, $userID);
		$result = $this->model_userresult->GetResult($courseID, $userID, $attempt);

		$correct = 0;

		foreach ($result->result() as $value) {
			if($value->userAnswer == $answers[$value->questionNumber]) {
				$correct ++;
			}
		}
		$grade = $correct / $result->num_rows;
		$this->model_quizattempt->SaveAttemptScore($courseID, $userID, $attempt, $grade);
		$this->model_usercourse->UpdateScore($courseID, $userID,  $grade);

		$course = $this->model_course->GetCourseById($courseID);

		if($grade * 100 + 0.001 >= $course->passPercentage) {
			// quiz passed, add small value to allow for float inaccuracy
			$this->model_usercourse->UpdateStatus($courseID, $userID, 4);
		} else {
			// quiz failed
			$this->model_usercourse->UpdateStatus($courseID, $userID, 3);
		}
	}
}
?>