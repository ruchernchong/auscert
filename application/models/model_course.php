<?php

/**
 * Class model_course
 */
Class model_course extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/**
	 * @return bool
	 */
	public function validate() {
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('users');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	/**
	 * returns a list of all courses available
	 * @return mixed
	 */
	public function GetAllCourses() {
		$this->db->from('courses');
		$this->db->order_by('courseName', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * returns a list of courses except the ones stated in the argument
	 * @param $omittedCourses
	 * @return bool
	 */
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

	/**
	 * returns a course based on an ID
	 * @param $courseID
	 * @return bool
	 */
	public function GetCourseById($courseID) {
		$this->db->where('courseID', $courseID);
		$query = $this->db->get('courses');

		if ($query->num_rows == 1) {
			return $query->result()[0];
		}
		return false;
	}

	/**
	 * searches for a course based on courseName
	 * @param $courseName
	 * @return bool
	 */
	public function GetCourseByName($courseName) {
		$this->db->like('courseName', $courseName);
		$query = $this->db->get('courses');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * returns the number of courses available
	 * @return mixed
	 */
	public function GetNumberOfCourses() {
		$query = $this->db->get('courses');
		return $query->num_rows;
	}

	/**
	 * Add a new course to the courses table
	 * @param $courseTitle
	 * @param $courseCategory
	 * @param $courseActive
	 * @param $courseDescription
	 * @param $coursePassPercentage
	 * @return mixed
	 */
	public function AddCourse($courseTitle, $courseCategory, $courseActive, $courseDescription, $coursePassPercentage) {
		$data = array(
			'courseName' => $courseTitle,
			'category' => $courseCategory,
			'creator' => $this->session->userdata['logged_in']['email'],
			'active' =>  $courseActive,
			'description' => $courseDescription,
			'passPercentage' => $coursePassPercentage
		);

		$this->db->insert('courses', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	/**
	 * Delete an existing course from the courses table
	 * @param $courseID
	 */
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

	/**
	 * activate a course
	 * @param $courseID
	 */
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

	/**
	 * Get the date of the last edited course
	 * @return bool
	 */
	public function GetCourseLastEdited() {
		$this->db->order_By('lastEdited', 'DESC');
		$query = $this->db->get('courses');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * Update the values of a course
	 * @param $courseID
	 * @param $courseTitle
	 * @param $courseCategory
	 * @param $courseDescription
	 * @param $coursePassPercentage
	 */
	public function UpdateCourse($courseID, $courseTitle, $courseCategory, $courseDescription, $coursePassPercentage) {
		$data = array(
			'courseName' => $courseTitle,
			'category' => $courseCategory,
			'description' => $courseDescription,
			'passPercentage' => $coursePassPercentage,
			'lastEdited' => date("Y-m-d H:i:s", time())
		);

		$this->db->where('courseID', $courseID);
		$this->db->update('courses', $data);

		$this->db->where('courseID', $courseID);
		$this->db->set('version', 'version+1', FALSE);
		$this->db->update('courses');
	}
}
?>