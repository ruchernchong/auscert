<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_user');
	}


	public function registerUsers() {
		$registerUsername = $this->input->post('registerUsername');
		$registerPassword = $this->input->post('registerPassword');
		$registerRepeatPassword = $this->input->post('registerRepeatPassword');
		$registerEmail = $this->input->post('registerEmail');
		$registerContact = $this->input->post('registerContact');

		$this->model_user->registerUsers($registerUsername, $registerPassword, $registerEmail, $registerContact);

		echo "<script>alert('Successfully registered.');</script>";

		redirect('login', 'refresh');
	}
}
?>