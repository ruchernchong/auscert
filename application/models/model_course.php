<?php

Class model_course extends CI_Model {
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
		$query = $this->db->get('courses');
		var_dump($query->num_rows);

		if ($query->num_rows >= 1) {
			return $query->result();
		}
		return false;
	}

	public function GetCourseById() {
		$this->db->where('courseID', $this->input->get('lid'));
		$query = $this->db->get('courses');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}
}
?>