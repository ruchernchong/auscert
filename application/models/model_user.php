<?php

/**
 * Class model_user
 */
Class model_user extends CI_Model {
	function __construct() {
		parent::__construct();

		$this->load->library(array('encrypt'));
	}

	/**
	 * Validate the user
	 * @return bool
	 */
	public function validate() {
		$this->db->where('email', $this->input->post('loginEmail'));
		$this->db->where('password', $this->input->post('loginPassword'));

		$query = $this->db->get('users');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	/**
	 * Create a user
	 * @param $registerEmail
	 * @param $registerPassword
	 * @param $registerFName
	 * @param $registerLName
	 * @param $registerContact
	 * @param $registerActivationKey
	 * @return mixed
	 */
	public function registerUsers($registerEmail, $registerPassword, $registerFName, $registerLName, $registerContact, $registerActivationKey) {
		$data = array(
			'email' => $registerEmail,
			'password' => $registerPassword,
			'fname' => $registerFName,
			'lname' => $registerLName,
			'contact' => $registerContact,
			'usertype' => 'user',
			'activation_key' => $registerActivationKey,
			'activated' => 0
		);

		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}


	/**
	 * return a list of all users
	 * @return bool
	 */
	public function GetAllUsers() {
		$this->db->order_by('fname', 'ASC');
		$query = $this->db->get('users');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * returns a user, given its userID
	 * @param $userID
	 * @return bool
	 */
	public function GetUserByID($userID) {
		$this->db->where('userID', $userID);
		$query = $this->db->get('users');

		if ($query->num_rows > 0) {
//			return $query->row_array();
			return $query->row();
		}
		return false;
	}

	/**
	 * searched for a user given a userName
	 * @param $searchTerm
	 * @return bool
	 */
	public function GetUserByName($searchTerm) {
		$this->db->like('fname', $searchTerm);
		$this->db->or_like('lname', $searchTerm);
		$this->db->or_like('email', $searchTerm);
		$this->db->order_by("fname", "asc");
		$query = $this->db->get('users');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * Return a list of all users except the ones given in the argument
	 * @param $omittedUsers
	 * @return bool
	 */
	public function GetAllUsersExcept($omittedUsers) {
		if (count($omittedUsers) > 0) {
			$this->db->from('users');
			$this->db->order_by('fname', 'ASC');
			$this->db->where_not_in('userID', $omittedUsers);
			$query = $this->db->get();

			if ($query->num_rows > 0) {
				return $query->result();
			}
			return false;
		}
	}

	function VerifyEmail($registerActivationKey) {
	/**
	 * Create email verification
	 * @param $registerActivationKey
	 * @return mixed
	 */
		$fname = $this->input->post('registerFName');
		$lname = $this->input->post('registerLName');
		$recipient = $this->input->post('registerEmail');
		$enc_email = str_replace(array('+', '/', '='), array('-', '_', '~'), $registerActivationKey);

		$from = "registration@ruchern.com";
		$subject = "Welcome AusCert! Verify your email address!";
		$message = "Dear " . $fname . " " . $lname . ", "
			. br(2) .
			"Welcome to AusCert. A new and wonderful adventure awaits you."
			. br(2) .
			"To begin, please kindly click on the activation link below to verify your email address."
			. br(2) . base_url('register/verify') . '/' . $enc_email . "." . br(3) .
			"Thank you,"
			. br(2) .
			"AusCert Administrator";

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = $from;
		$config['smtp_pass'] = '12M34h56!';
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from($from, 'AusCert Administrator');
		$this->email->to($recipient);
		$this->email->subject($subject);
		$this->email->message($message);

		return $this->email->send();
	}

	function VerifyEmailID($activation_key) {
	/**
	 * Verify if Email is valid
	 * @param $activation_key
	 * @return mixed
	 */
		$activate = array(
			'activated' => 1
		);

		$this->db->where('activation_key', $activation_key);

		return $this->db->update('users', $activate);
	}
}
?>