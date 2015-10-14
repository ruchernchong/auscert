<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class logout
 */
class logout extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	//Log out a user
	function index() {
	/**
	 * Logs out a user
	 */
		$this->session->unset_userdata('logged_in');
		redirect('home', 'refresh');
		session_destroy();
	}
}