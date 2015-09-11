<?php

Class model_userGroup extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//returns an array (instead of an object) of all groupID and organisations of a user
	public function GetUserGroups($userID) {
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

    //returns an array (instead of object) of all users wuthin a group
    public function GetGroupUsers($groupID) {
        $this->db->select('ug.userID');
        $this->db->from('groups AS g, user_groups AS ug');
        $this->db->where('ug.groupID', $groupID);
        $this->db->where('g.groupID = ug.groupID');
        $query = $this->db->get();

        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        return false;
    }

    //returns the count of members within a group
    public function GetUserCount($groupID) {
        $this->db->where('groupID', $groupID);
        $query = $this->db->count_all_results('user_groups');

        if ($query) {
            return $query;
        }
    }

    //Assign a user to the group
    public function AddUserToGroup() {
        return true;
    }

    //Remove a user from the group
    public function RemoveUserFromGroup() {
        return true;
    }

    //	//get a list of users details and the groups they are assigned to
//	public function GetUsersAndGroups() {
//		$this->db->join('groups', 'groups.groupID = user_groups.groupID', 'full outer');
//		$this->db->join('users', 'users.userID = user_groups.userID', 'full outer');
//		$query = $this->db->get('user_groups');
//
//		if ($query->num_rows > 0) {
//			return $query->result();
//		}
//		return false;
//	}

}
?>