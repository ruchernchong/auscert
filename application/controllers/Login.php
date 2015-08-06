<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	public function Index(){
		
		$this->load->view('login');
	}
	public function Check_Login()
	{
		
		$username = $this->input->post('username');
		$query = $this->user_model->validate();
		
		if ($query){
			$sess_array = array();
			foreach($query as $row)
			{
				$sess_array = array(
					'username' => $row->userID);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			redirect('home', 'refresh');
		}
		else{
            //echo '123';
			redirect('welcome','refresh');
		}
	}


}


?>