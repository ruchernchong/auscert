<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class addCourse extends CI_Controller {
	function __construct(){
        parent::__construct();
		
		
    }
    public function index(){
  
         if($this->session->userdata('logged_in'))
		   {
			 $session_data = $this->session->userdata('logged_in');
			 $data['username'] = $session_data['username'];
			 $data['menu'] = "adminpage";
			 $this->load->view('header',$data);
			 $this->load->view('view_addCourse');
		   }
		   else
		   {
			 //If no session, redirect to login page
			 redirect('welcome', 'refresh');
		   }
    }
    

}


?>