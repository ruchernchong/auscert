<?php

Class model_userCourse extends CI_Model {
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

	public function GetUserCourses() {
		// $this->db->select('*');
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$this->db->join('courses', 'courses.courseID = user_courses.courseID', "INNER");
		$this->db->order_by("courseName", "ASC");
		$query = $this->db->get('user_courses');
		return $query->result();
	}

	public function GetUserCoursesID() {
		$this->db->select('courseID');
		$this->db->from('user_courses');
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$query = $this->db->get();
		return $query->result();
	}

	public function GetNumberOfUserCourses() {
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$query = $this->db->get('user_courses');
		return $query->num_rows;
	}

	public function RegisterToCourse($userID, $courseID) {
		$data = array('userID' => $userID, 'courseID' => $courseID); 
		$query = $this->db->insert('user_courses', $data);
	}

	public function DropFromCourse($userID, $courseID) {
		$data = array('userID' => $userID, 'courseID' => $courseID);
		$query = $this->db->delete('user_courses', $data);
	}
}
?>


