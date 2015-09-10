<?php

Class model_groupCourse extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function GetGroupCourses($groupID) {
        $this->db->distinct();
        $this->db->select('gc.groupID, c.courseID, c.courseName');
        $this->db->from('courses AS c, group_courses AS gc');
        $this->db->where('gc.groupID', $groupID);
        $this->db->where('gc.courseID', 'c.courseID');
        $query = $this->db->get();

        if ($query->num_rows > 0) {
            return $query->result();
        }
        return false;
    }
}
?>