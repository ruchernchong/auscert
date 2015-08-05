<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Addcourse extends CI_Controller {
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
			 $this->load->view('addCourse_view');
		   }
		   else
		   {
			 //If no session, redirect to login page
			 redirect('welcome', 'refresh');
		   }
    }
    

}


?>