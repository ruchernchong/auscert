<?php

Class model_slide extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Get the current slide id
	public function GetSlideById() {
		$this->db->where('courseID', $this->input->get('courseID'));
		$this->db->where('slideID', $this->input->get('slideID'));

		$query = $this->db->get('slides');
		
		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	//get the current slide object
	public function GetSlide() {
		$this->db->where('courseID', $this->input->get('courseID'));

		$query = $this->db->get('slides');

		if ($query->num_rows > 0) {
			return $query->result();
		} 
		return false;
	}

	//get the current slide
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
