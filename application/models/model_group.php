<?php

Class model_group extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function GetGroups() {
		$this->db->order_by("organisation", "ASC");
		$query = $this->db->get('groups');

		if ($query->num_rows >= 1) {
			return $query->result();
		}
		return false;
	}

	public function GetGroupByID() {
		$query = $this->db->get('groups');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetNumberOfGroups() {
		$query = $this->db->get('groups');
		return $query->num_rows;
	}
}
?>