<?php

Class model_slide extends CI_Model {
	function __construct() {
		parent::__construct();
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
}
?>
