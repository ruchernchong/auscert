<?php

Class model_groupCourse extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function GetGroupCourses($groupID) {
        $this->db->select('gc.groupID, gc.courseID, c.courseName');
        $this->db->from('courses AS c, group_courses AS gc');
        $where = "gc.courseID = c.courseID AND gc.groupID='" . $groupID . "'";
        $this->db->where($where);
//        $this->db->where('gc.courseID', 'c.courseID');
//        $this->db->where('gc.groupID', $groupID);

        $query = $this->db->get();

        if ($query->num_rows > 0) {
            return $query->result();
        }
        return false;
    }
}
?>