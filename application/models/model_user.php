<?php

Class model_user extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function validate() {
		$this->db->where('username', $this->input->post('loginUsername'));
		$this->db->where('password', $this->input->post('loginPassword'));

		$query = $this->db->get('users');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function registerUsers($registerUsername, $registerPassword, $registerEmail, $registerContact) {
		$registerUsername = $this->input->post('registerUsername');
		$registerPassword = $this->input->post('registerPassword');
		$registerRepeatPassword = $this->input->post('registerRepeatPassword');
		$registerEmail = $this->input->post('registerEmail');
		$registerContact = $this->input->post('registerContact');
		
		$data = array(
			'username' => $registerUsername,
			'password' => $registerPassword,
			'email' => $registerEmail,
			'contact' => $registerContact,
			'userType' => 'student'
			);

		$this->db->insert('users', $data);
	}

	public function GetUsers() {
		$this->db->order_by('username', 'ASC');
		$query = $this->db->get('users');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}
}
?>