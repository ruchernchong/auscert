<?php

Class model_course extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('users');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	//returns a list of all courses available
	public function GetAllCourses() {
		$this->db->from('courses');
		$this->db->order_by('courseName', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//returns a list of courses except the ones stated in the argument
	public function GetAllCoursesExcept($omittedCourses) {
		if (count($omittedCourses) > 0) {
			$this->db->from('courses');
			$this->db->order_by('courseName', 'ASC');
			$this->db->where_not_in('courseID', $omittedCourses);
			$query = $this->db->get();

			if ($query->num_rows > 0) {
				return $query->result();
			}
			return false;
		}
	}

	//returns a course based on an ID
	public function GetCourseById($courseID) {
		$this->db->where('courseID', $courseID);
		$query = $this->db->get('courses');

		if ($query->num_rows == 1) {
			return $query->result()[0];
		}
		return false;
	}

	//returns the number of courses available
	public function GetNumberOfCourses() {
		$query = $this->db->get('courses');
		return $query->num_rows;
	}

	//Add a new course to the courses table
	public function AddCourse($courseTitle, $courseCategory, $courseActive, $courseDescription, $passPercentage) {
		$data = array(
			'courseName' => $courseTitle,
			'category' => $courseCategory,
			'creator' => $this->session->userdata['logged_in']['username'],
			'active' =>  $courseActive,
			'description' => $courseDescription,
			'passPercentage' => $passPercentage
			);

		$this->db->insert('courses', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	//Delete an existing course from the courses table
	public function DeleteCourse($courseID) {
		// Cascade deletion. If deleting from courses, remove the others first before deleting the course itself.
		$tables = array(
			'user_courses',
			'slides',
			'questions',
			'answers',
			'courses'
		); //cascade deletion to user_courses table as well
		$this->db->where('courseID', $courseID);
		$this->db->delete($tables);
	}

	//activate a course
	public function ActivateCourse($courseID) {
		$data = array(
			'active' => 1
			);

		$this->db->where('courseID', $courseID);
		$this->db->update('courses', $data);
	}

	//deactivate a course
	public function DeactivateCourse($courseID) {
		$data = array(
			'active' => 0
			);

		$this->db->where('courseID', $courseID);
		$this->db->update('courses', $data);
	}

	//Get the date of the last edited course
	public function GetCourseLastEdited() {
		$this->db->order_By('lastEdited', 'DESC');
		$query = $this->db->get('courses');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	//Update the values of a course
	public function UpdateCourse($courseID, $courseTitle, $courseCategory, $courseDescription) {
		$data = array(
			'courseName' => $courseTitle,
			'category' => $courseCategory,
			'description' => $courseDescription,
			'lastEdited' => date("Y-m-d H:i:s", time())
			);

		$this->db->where('courseID', $courseID);
		$this->db->update('courses', $data);
	}
}
?>