<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller {
	function __construct(){
        parent::__construct();
    }
    public function Index(){
  
        $this->load->view('login');
    }
    public function Check_Login()
    {
        $this->load->model('user_model');

        $query = $this->user_model->validate();

        if ($query){
            redirect('/Welcome/login');
        }
        else{
            //echo '123';
            redirect('/Login/Index');
        }
    }
}


?>