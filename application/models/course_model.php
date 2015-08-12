<?php

Class course_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function validate() {
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',$this->input->post('password'));

		$query = $this->db->get('user');
        //var_dump($query->num_rows);
		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetCourse() {
		$query = $this->db->get('lessons');
        //var_dump($query->num_rows);
		if ($query->num_rows >= 1) {
			return $query->result();
		}
		return false;
	}

	public function GetCourseById() {
		$this->db->where('lessonID',$this->input->get('lid'));
		$query = $this->db->get('lessons');
		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}
}
?>
