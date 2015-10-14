<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class logout
 */
class logout extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	/**
	 * Logs out a user
	 */
	public function index() {
		$this->session->unset_userdata('logged_in');
		$this->session->set_flashdata('logout-success', 'You have successfully logged out.');

		redirect('home', 'refresh');
		session_destroy();
	}
}