<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageCourse extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_group');
        $this->load->model('model_course');
    }

    function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['usertype'] = $session_data['usertype'];
            $data['menu'] = 'admin';

            $thisGroup = $this->model_group->GetGroupByID($this->input->get('groupID'));

//            $assignedCourses = $this->model_groupCourse_-> GetGroupCourses($groupID);
            $otherCourses = $this->model_course->GetAllCourses();

            if ($thisGroup) {
                $data['thisGroup'] = $thisGroup;
            }

//            if ($assignedCourses) {
//                $data['assignedCourses'] = $assignedCourses;
//            }

            if($otherCourses) {
                $data['$otherCourses'] = $otherCourses;
            }

            if ($data['usertype'] != 'admin') {
                $this->session->set_flashdata('denied', 'You do not have permission to view this page.');
                redirect('home', 'refresh');
            } else {
                $this->load->view('header', $data);
                $this->load->view('view_manageCourse', $data);
            }
        } else {
            redirect('login', 'refresh');
        }
    }
}
?>