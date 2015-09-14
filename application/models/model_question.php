<?php

Class model_question extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	// Returns all questions associated with a given course
	public function GetQuestions($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->order_by("questionOrder", "asc"); 

		$query = $this->db->get('questions');
		
		if ($query->num_rows > 0) {
			return $query->result();
		} else {
			return array();
		}	
	}
	
	//Delete all questions for a given course with a question order equal to or higher than that given 
	public function DeleteHigherQuestions($courseID, $questionOrder) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder >=', $questionOrder);
		$this->db->delete('questions');
	}
	
	
	//Add a new question to the questions table for a given course, or updates if it already exists 
	public function SaveQuestion($courseID, $questionOrder, $questionText) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$query = $this->db->get('questions');

		if ($query->num_rows > 0) {
			$data = array(
				'questionText' => $questionText,
				);
			
			$this->db->where('courseID', $courseID);
			$this->db->where('questionOrder', $questionOrder);
			$this->db->update('questions', $data);
		} else {
			$data = array(
				'courseID' => $courseID,
				'questionOrder' => $questionOrder,
				'questionText' => $questionText,
				);
			
			$this->db->insert('questions', $data);
		}
	}
}
?>