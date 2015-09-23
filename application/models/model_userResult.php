<?php

Class model_userresult extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Add a new answer to the answers table for a given course, or updates if it already exists 
	public function SaveResults($courseID, $userID, $results) {
	// find how many attempts have already been made
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$this->db->where('questionOrder', 0);
		$query = $this->db->get('user_results');

		$attempt = $query->num_rows;
		$questionCount = count($results);

		$data = array();

		foreach ($results as $key => $value) {
			$answer = array(
				'courseID' => $courseID,
				'questionOrder' => $key,
				'userID' => $userID,
				'attempt' => $attempt,
				'userAnswer' => $value,
				);
			array_push($data, $answer);
		}
		$this->db->insert_batch('user_results', $data);
	}
}
?>