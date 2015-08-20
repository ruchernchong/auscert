<?php

Class model_addCourse extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function save_course($title, $category, $active, $description) {
		

		$data = array(
			'courseName' => $title,
			'category' => $category,
			'creator' => $this->session->userdata['logged_in']['username'],
			'active' =>  $active,
			'description' => $description,
			);

		$this->db->insert('courses', $data); 
	}
}
?>





