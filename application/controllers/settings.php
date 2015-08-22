<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('model_user');
	}

	public function index() {
		$this->load->view('view_settings');
	}
}