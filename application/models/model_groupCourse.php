<?php

Class model_groupCourse extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    //returns an array (instead of an object) of all groupID and organisations of a user
    public function GetGroupCourses($groupID) {
        $this->db->select('gc.groupID, c.courseID, c.courseName');
        $this->db->from('courses AS c, group_courses AS gc');
        $this->db->where('gc.groupID', $groupID);
        $query = $this->db->get();

        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        return false;
    }
}
?>