<?php

Class model_userGroup extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    //get a list of users details and the groups they are assigned to
    public function GetUsersAndGroups() {
        $this->db->join('groups', 'groups.groupID = user_groups.groupID', 'full outer');
        $this->db->join('users', 'users.userID = user_groups.userID', 'full outer');
        $query = $this->db->get('user_groups');

        if ($query->num_rows > 0) {
            return $query->result();
        }
        return false;
    }

    //returns an array (instead of an object) of all groupID and organisations of a user
    public function GetUserGroup($userID) {
        $this->db->select('g.groupID, g.organisation');
        $this->db->from('groups AS g, user_groups AS ug');
        $this->db->where('ug.userID', $userID);
        $this->db->where('g.groupID = ug.groupID');
        $query = $this->db->get();

        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        return false;
    }
}
?>