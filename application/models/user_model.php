<?php

Class user_model extends CI_Model{
	function __construct(){
        parent::__construct();
    }
    public function validate(){
        $this->db->where('userID',$this->input->post('username'));
        $this->db->where('password',$this->input->post('password'));
        
        $query = $this->db->get('user');
        //var_dump($query->num_rows);
        if ($query->num_rows == 1)
		{
			return $query->result();
        }return false;
    }
}
?>
