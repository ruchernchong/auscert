<?php

Class model_quizattempt extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Add a new attempt to the table 
	public function SaveAttempt($courseID, $userID, $version) {
	// find how many attempts have already been made
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$query = $this->db->get('quiz_attempt');

		$attempt = $query->num_rows;

		$data = array(
			'courseID' => $courseID,
			'userID' => $userID,
			'attempt' => $attempt,
			'version' => $version,
		);
			
		$this->db->insert('quiz_attempt', $data);
		return $attempt;
	}

	//Save the score for a given attempt
	public function SaveAttemptScore($courseID, $userID, $attempt, $score) {
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$this->db->where('attempt', $attempt);
		$this->db->set('score', $score);
		$this->db->update('quiz_attempt');
	}


	// Return the latest Attempt number for a user and course
	public function GetLatestAttemptNumber($courseID, $userID) {
		$this->db->select_max('attempt');
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$query = $this->db->get('quiz_attempt');
		
		if ($query->num_rows < 1) {
			return FALSE;
		}

		return (int) $query->result()[0]->attempt;
	}

	// Return an attempt from a user for a given course and attmpt number
	public function GetAttempt($courseID, $userID, $attempt) {
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$this->db->where('attempt', $attempt);
		$query = $this->db->get('quiz_attempt');

		if ($query->num_rows > 0) {
			return $query->row();
		}
		return FALSE;
	}

	// Return the latest attempt from a user for a given course
	public function GetLatestAttempt($courseID, $userID) {
		$this->db->select_max('attempt');
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$query = $this->db->get('quiz_attempt');

		if ($query->num_rows > 0) {
			return $query->row();
		}
		return FALSE;
	}
}
?>