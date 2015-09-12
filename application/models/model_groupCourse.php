<?php

Class model_groupCourse extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Returns a list of courses assigned to a group
	public function GetGroupCourses($groupID) {
		$this->db->select('gc.groupID, gc.courseID, c.courseName');
		$this->db->from('courses AS c, group_courses AS gc');
		$this->db->where('gc.groupID', $groupID);
		$this->db->where('gc.courseID = c.courseID');
		$query = $this->db->get();

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

    //Assign course to group
    public function AddCourseToGroup($courseID, $groupID) {
        $course = array('groupID' => $groupID, 'courseID' => $courseID);
        $this->db->insert('group_courses', $course);
    }

    //Remove a course from the group
    public function RemoveCourseFromGroup($courseID, $groupID) {
        $course = array('groupID' => $groupID, 'courseID' => $courseID);
        $this->db->where($course);
        $this->db->delete('group_courses');
    }

}
?>