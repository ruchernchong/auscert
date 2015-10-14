<?php

/**
 * Class model_userresult
 */
Class model_userresult extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	// Adds a new set of answers for a quiz attempt by a user 
	public function SaveResults($courseID, $userID, $attempt, $results) {
		$questionCount = count($results);

		$data = array();

		foreach ($results as $key => $value) {
			$answer = array(
				'courseID' => $courseID,
				'userID' => $userID,
				'attempt' => $attempt,
				'questionNumber' => $key,
				'userAnswer' => $value,
				);
			array_push($data, $answer);
		}
		$this->db->insert_batch('user_results', $data);
	}

	// Return the results for a given, course, user and attempt
	public function GetResult($courseID, $userID, $attempt) {
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$this->db->where('attempt', $attempt);
		$query = $this->db->get('user_results');

		if ($query->num_rows > 0) {
			return $query;
		}
		return FALSE;
	}
}
?>