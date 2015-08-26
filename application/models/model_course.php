<?php

Class model_course extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function validate() {
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',$this->input->post('password'));

		$query = $this->db->get('users');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetCourse() {
		$this->db->order_By("courseName", "ASC");
		$query = $this->db->get('courses');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	public function GetCourseById() {
		$this->db->where('courseID', $this->input->get('courseID'));
		$query = $this->db->get('courses');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetNumberOfCourses() {
		$query = $this->db->get('courses');
		return $query->num_rows;
	}

	public function GetCourseIDList() {
		$this->db->select('courseID, courseName');
		$this->db->from('courses');
		$query = $this->db->get();
		return $query->result();
	}

	public function DropFromCourse($courseID) {
		$data = array('courseID' => $courseID);
		$query = $this->db->delete('courses', $data);
	}

	public function GetCourseLastEdited() {
		$this->db->order_By('lastEdited', 'DESC');
		$query = $this->db->get('courses');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}
	
	public function SaveCourse($courseTitle, $courseCategory, $courseActive, $courseDescription) {
		
		$data = array(
			'courseName' => $courseTitle,
			'category' => $courseCategory,
			'creator' => $this->session->userdata['logged_in']['username'],
			'active' =>  $courseActive,
			'description' => $courseDescription,
			);

		$this->db->insert('courses', $data); 
	}
}
?>