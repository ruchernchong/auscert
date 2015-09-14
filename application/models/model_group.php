<?php

Class model_group extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//returns a list of all available groups
	public function GetGroups() {
		$this->db->order_by("organisation", "ASC");
		$query = $this->db->get('groups');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	//returns a group based on the provided groupID
	public function GetGroupByID($groupID) {
		$this->db->where('groupID', $groupID);
		$query = $this->db->get('groups');
		if ($query->num_rows == 1) {
			return $query->row_array();
		}
		return false;
	}

	//returns the number of groups in the system
	public function GetNumberOfGroups() {
		$query = $this->db->get('groups');
		return $query->num_rows;
	}

	//Delete the group
	public function DeleteGroup() {
		return true;
	}
}
?>