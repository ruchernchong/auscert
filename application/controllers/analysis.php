<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class analysis extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('model_user');
        $this->load->model('model_userCourse');
        $this->load->model('model_course');
        $this->load->model('model_group');
        $this->load->model('model_slide');
    }

    function index() {
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['usertype'] = $session_data['usertype'];
            $data['menu'] = "admin";

            if ($getCourse = $this->model_course->GetCourseByID($this->input->get('courseID'))) {
                $data['course'] = $getCourse;
            }

            if ($getCourseUsers = $this->model_userCourse->GetUsersFromCourse($this->input->get('courseID'))) {
                $data['courseUsers'] = $getCourseUsers;
            }

            if ($getCompletedCourseUsers = $this->model_userCourse->GetCompletedUsers($this->input->get('courseID'))) {
                $data['completedUsers'] = $getCompletedCourseUsers;
            } else {
                $data['completedUsers'] = "No users have completed the course yet";
            }

            if ($data['usertype'] != "admin") {
                $this->session->set_flashdata('denied', 'You do not have permission to view this page.');
                redirect('home', 'refresh');
            } else {
                $this->load->view('header',$data);
                $this->load->view('view_analysis',$data);
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    function dropCourse() {
        $courseID = $this->input->get('id', TRUE);
        $this->model_course->DeleteCourse($courseID);

        redirect('admin', 'refresh');
    }
}