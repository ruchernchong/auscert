<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Edits extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('course_model');
        	$this->load->model('slide_model');
		
    }
    public function index(){
  
         if($this->session->userdata('logged_in'))
		   {
			 $session_data = $this->session->userdata('logged_in');
			 $data['username'] = $session_data['username'];
			 $data['menu'] = "adminpage";
			 $this->load->view('header',$data);
			 $this->load->view('edits_view');
		   }
		   else
		   {
			 //If no session, redirect to login page
			 redirect('welcome', 'refresh');
		   }
    }
    

}


?>