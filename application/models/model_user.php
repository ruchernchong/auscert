<?php

Class model_user extends CI_Model {
	function __construct() {
		parent::__construct();

		$this->load->library(
			array(
				'encrypt'
			)
		);
	}

	//Validate the user
	public function validate() {
		$this->db->where('email', $this->input->post('loginEmail'));
		$this->db->where('password', $this->input->post('loginPassword'));

		$query = $this->db->get('users');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	//Create a user
	public function registerUsers($registerEmail, $registerPassword, $registerFName, $registerLName, $registerContact) {
		$encrypt_email = $this->encrypt->encode($registerEmail);
		$encrypted_email = str_replace(
			array(
				'+',
				'/',
				'='
			),
			array(
				'-',
				'_',
				'~'
			),
			$encrypt_email
		);

		$data = array(
			'email' => $registerEmail,
			'password' => $registerPassword,
			'fname' => $registerFName,
			'lname' => $registerLName,
			'contact' => $registerContact,
			'usertype' => 'user',
			'activation_key' => $encrypted_email,
			'activated' => 0
		);

		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}


	//return a list of all users
	public function GetAllUsers() {
		$this->db->order_by('fname', 'ASC');
		$query = $this->db->get('users');

		if ($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}

	//searches for a course based on courseName
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

	//returns a list of all users except the ones given in the argument
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

	// Create email verification.
	function VerifyEmail($recipient) {
//		$encrypt_email = md5($recipient);
		$encrypt_email = $this->encrypt->encode($recipient);
		$encrypted_email = str_replace(
			array(
				'+',
				'/',
				'='
			),
			array(
				'-',
				'_',
				'~'
			),
			$encrypt_email
		);

		$from = "registration@ruchern.com";
		$subject = "Welcome AusCert! Verify your email address!";
		$message = "Dear User, "
			. br(2) .
			"Welcome to AusCert. A new and wonderful adventure awaits you."
			. br(2) .
			"To being, please kindly click on the activation link below to verify your email address."
			. br(2) . base_url('register/verify') . '/' . $encrypted_email . "." . br(3) .
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

		$this->email->from($from, 'AusCert');
		$this->email->to($recipient);
		$this->email->subject($subject);
		$this->email->message($message);

		return $this->email->send();
	}

	// Verify if Email is valid.
	function VerifyEmailID($key) {
		$decrypt_email = $key;
		$decrypted_email = str_replace(
			array(
				'-',
				'_',
				'~'
			),
			array(
				'+',
				'/',
				'='
			),
			$decrypt_email
		);

		$this->encrypt->decode($decrypted_email);

		$this->db->where('activation_key', $decrypt_email);
//		$this->db->where('activation_key', $key);
		$this->db->set('activated', 1);

		return $this->db->update('users');
	}
}
?>