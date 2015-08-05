<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
	$this->load->model('course_model');

    }
    public function index(){
  
         if($this->session->userdata('logged_in'))
		   {
			 $session_data = $this->session->userdata('logged_in');
			 $data['username'] = $session_data['username'];
			 $data['menu'] = "home";
			 $this->load->view('header',$data);
			 $this->load->view('test1');
		   }
		   else
		   {
			 //If no session, redirect to login page
			 redirect('welcome', 'refresh');
		   }
    }
   
	function logout()
			 {
				 
			   $this->session->unset_userdata('logged_in');
			   redirect('home','refresh');
			   session_destroy();
			 }
 
	
	function mygrade()
			 {
				 if($this->session->userdata('logged_in'))
		   {
			 $session_data = $this->session->userdata('logged_in');
			 $data['username'] = $session_data['username'];
			 $data['menu'] = "mygrade";
			 $this->load->view('header',$data);
			 $this->load->view('mygrade_view');
		   }
		   else
		   {
			 //If no session, redirect to login page
			 redirect('welcome', 'refresh');
		   } 
			  
			 }
			 

			 
	 function adminpage()
		 {
			 if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $data['menu'] = "adminpage";
		 $query = $this->course_model->GetCourse();
                         if ($query){
                              $data['lessons'] = $query;
                         }

		 $this->load->view('header',$data);
		 $this->load->view('adminpage_view',$data);
	   }
	   else
	   {
		 //If no session, redirect to login page
		 redirect('welcome', 'refresh');
	   } 
		  
		 }

}


?>