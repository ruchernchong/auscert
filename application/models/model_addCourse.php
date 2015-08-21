<?php

Class model_addCourse extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function saveCourse($courseTitle, $courseCategory, $courseActive, $courseDescription) {
		

		$data = array(
			'courseName' => $courseTitle,
			'category' => $courseCategory,
			'creator' => $this->session->userdata['logged_in']['username'],
			'active' =>  $courseActive,
			'description' => $courseDescription,
			);

		$this->db->insert('courses', $data); 
	}
}
?>