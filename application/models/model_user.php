<?php

Class model_user extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function validate() {
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',$this->input->post('password'));

		$query = $this->db->get('users');
		//var_dump($query->num_rows);
		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetUsers() {
		$query = $this->db->get('users');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}
}
?>