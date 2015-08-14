<?php

Class slide_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function GetSlideById() {
		$this->db->where('courseID',$this->input->get('courseID'));
		$this->db->where('slideID',$this->input->get('slideID'));
		$query = $this->db->get('slide');
		//var_dump($query->num_rows);
		
		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetSlide() {
		$this->db->where('courseID',$this->input->get('lid'));

		//$this->db->where('sid',$this->input->get('sid'));
		$query = $this->db->get('slide');
		//var_dump($query->num_rows);

		if ($query->num_rows >= 1) {
			return $query->result();
		}
		return false;
	}
}
?>
