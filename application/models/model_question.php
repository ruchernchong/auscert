<?php

Class model_question extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	// Returns all questions associated with a given course
	public function GetQuestions($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->order_by("question", "asc"); 

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
		$this->db->where('slideOrder >=', $slideOrder);
		$this->db->delete('slides');
	}
	
	
	//Add a new slide to the slides table for a given course, or updates if it already exists 
	public function SaveQuestion($courseID, $questionOrder, $questionText) {
		$data = array(
			'questionText' => $questionText,
		);
		
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$query = $this->db->get('questions');

		if ($query->num_rows > 0) {
			$data = array(
				'slideTitle' => $slideTitle,
				'slideContent' =>  $slideContent,
			);
		
			$this->db->where('courseID', $courseID);
			$this->db->where('slideOrder', $slideOrder);
			$this->db->update('slides', $data);
		} else {
			$data = array(
				'courseID' => $courseID,
				'slideOrder' => $slideOrder,
				'slideTitle' => $slideTitle,
				'slideContent' =>  $slideContent,
			);
	
			$this->db->insert('slides', $data);
			$insert_id = $this->db->insert_id();
		}
	}
	
	
	
	
	
	
	
	public function GetSlideById() {
		$this->db->where('courseID', $this->input->get('courseID'));
		$this->db->where('slideID', $this->input->get('slideID'));

		$query = $this->db->get('slides');
		
		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetSlide() {
		$this->db->where('courseID', $this->input->get('courseID'));

		$query = $this->db->get('slides');

		if ($query->num_rows > 0) {
			return $query->result();
		} 
		return false;
	}
	
	public function GetSlidesByCourse($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->order_by("slideOrder", "asc"); 

		$query = $this->db->get('slides');
		
		if ($query->num_rows > 0) {
			return $query->result();
		} else {
			return array();
		}		
	}
	
	//Add a new slide to the slides table for a given course, or updates if it already exists 
	public function SaveSlide($courseID, $slideOrder, $slideTitle, $slideContent) {
		$data = array(
			'slideTitle' => $slideTitle,
			'slideContent' =>  $slideContent,
		);
		
		$this->db->where('courseID', $courseID);
		$this->db->where('slideOrder', $slideOrder);
		$query = $this->db->get('slides');

		if ($query->num_rows > 0) {
			$data = array(
				'slideTitle' => $slideTitle,
				'slideContent' =>  $slideContent,
			);
		
			$this->db->where('courseID', $courseID);
			$this->db->where('slideOrder', $slideOrder);
			$this->db->update('slides', $data);
		} else {
			$data = array(
				'courseID' => $courseID,
				'slideOrder' => $slideOrder,
				'slideTitle' => $slideTitle,
				'slideContent' =>  $slideContent,
			);
	
			$this->db->insert('slides', $data);
			$insert_id = $this->db->insert_id();
		}
	}
	
	//Delete a slide from a given course with a given ID
	public function DeleteSlide($courseID, $slideOrder) {
		$this->db->where('courseID', $courseID);
		$this->db->where('slideOrder', $slideOrder);
		$this->db->delete('slides');
	}
	
	//Delete all slides for a given course with a slide order equal to or higher than that given 
	public function DeleteHigherSlides($courseID, $slideOrder) {
		$this->db->where('courseID', $courseID);
		$this->db->where('slideOrder >=', $slideOrder);
		$this->db->delete('slides');
	}
}
?>