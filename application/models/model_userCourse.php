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

	//Returns a list of the current user's courses
	public function GetUserCourses() {
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$this->db->join('courses', 'courses.courseID = user_courses.courseID', 'INNER');
		$this->db->order_by('courseName', 'ASC');
		$query = $this->db->get('user_courses');
		return $query->result();
	}

	//Returns the number of courses a user is enrolled into
	public function GetNumberOfUserCourses() {
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$query = $this->db->get('user_courses');
		return $query->num_rows;
	}

	//Add a user and his corresponding enrolled course to the usercourse table
	public function RegisterToCourse($userID, $courseID) {
		$data = array('userID' => $userID, 'courseID' => $courseID); 
		$this->db->insert('user_courses', $data);
	}

	//Remove a user and his corresponding dropped course from the usercourse table
	public function DropFromCourse($userID, $courseID) {
		$data = array('userID' => $userID, 'courseID' => $courseID);
		$this->db->delete('user_courses', $data);
	}

	//Returns a list of users who are enrolled in a course
	public function GetUsersFromCourse($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->join('users', 'users.userID = user_courses.userID', 'INNER');
		$this->db->order_by('username', 'ASC');
		$query = $this->db->get('user_courses');
		return $query->result();
	}

    //Returns a list of users who have completed the course
	public function GetCompletedUsers($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->where('completion', 100);
		$this->db->join('users', 'users.userID = user_courses.userID', 'INNER');
		$this->db->order_by('username', 'ASC');
        $query = $this->db->get('user_courses');
		return $query->result();
	}

	public function GetCompletedUserCourse($userID) {
		$this->db->where('userID', $userID);
		$this->db->where('completion', 100);
		// $this->db->join('users', 'users.userID = user_courses.userID', 'INNER');
		$this->db->join('courses', 'courses.courseID = user_courses.courseID', 'INNER');
		$this->db->order_by('courseName', 'ASC');
		$query = $this->db->get('user_courses');
		return $query->result();
	}
	//
}
?>


