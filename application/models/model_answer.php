<?php

Class model_answer extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	// Returns all answers associated with a given course's question
	public function GetAnswers($courseID, $questionOrder) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$this->db->order_by("answerOrder", "asc");

		$query = $this->db->get('answers');
		
		if ($query->num_rows > 0) {
			return $query->result();
		} else {
			return array();
		}	
	}
	
	//Delete all answers for a given course with a answer order equal to or higher than that given 
	public function DeleteHigherAnswers($courseID, $questionOrder, $answerOrder) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$this->db->where('answerOrder >=', $answerOrder);
		$this->db->delete('answers');
	}

	//Add a new answer to the answers table for a given course, or updates if it already exists 
	public function SaveAnswer($courseID, $questionOrder, $answerOrder, $answerText) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$this->db->where('answerOrder', $answerOrder);
		$query = $this->db->get('answers');

		if ($query->num_rows > 0) {
			$data = array(
				'answerText' => $answerText,
				);
			
			$this->db->where('courseID', $courseID);
			$this->db->where('questionOrder', $questionOrder);
			$this->db->where('answerOrder', $answerOrder);
			
			$this->db->update('answers', $data);
		} else {
			$data = array(
				'courseID' => $courseID,
				'questionOrder' => $questionOrder,
				'answerOrder' => $answerOrder,
				'answerText' => $answerText,
				);
			
			$this->db->insert('answers', $data);
		}
	}
}
?>