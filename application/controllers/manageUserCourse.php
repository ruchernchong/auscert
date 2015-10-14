<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class manageUserCourse
 */
class manageUserCourse extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model(
            array(
                'model_course', 'model_group', 'model_user', 'model_usercourse', 'model_usergroup'
            )
        );
    }

    function _remap() {
    /**
     *
     */
        $method = $this->uri->segment(2);

        switch($method){
            case null:
            case false:
            case is_numeric($method):
                $this->index();
                break;
            case 'addCourses':
                $this->addCourses();
                break;
            case 'removeCourses':
                $this->removeCourses();
                break;
            default:
                show_404();
                break;
        }
    }

    function index() {
    /**
     *
     */
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['fname'] = $session_data['fname'];
            $data['lname'] = $session_data['lname'];
            $data['usertype'] = $session_data['usertype'];
            $data['menu'] = 'admin';

            $userID = $this->uri->segment(2); //get the current userID

            $thisUser = $this->model_user->GetUserByID($userID);
            $this->debugConsole($thisUser->fname);
            $assignedCourses = $this->model_usercourse->GetUserCourses($userID); //Get courses user is enrolled in
            $omittedCourses = [];

            if (!empty($assignedCourses)) {
                foreach ($assignedCourses as $assignedCourse) {
                    array_push($omittedCourses, $assignedCourse->courseID); //push in all the courses to be omitted
                }
                $otherCourses = $this->model_course->GetAllCoursesExcept($omittedCourses);//Get all courses not assigned to user
            }
            else {
                $otherCourses = $this->model_course->GetAllCourses();
            }


            //Gets the current user object
            if ($thisUser) {
                $data['thisUser'] = $thisUser;
            } else {
                $data['thisUser'] = null;
            }

            //Gets the current user's assigned course
            if ($assignedCourses) {
                $data['assignedCourses'] = $assignedCourses;
            } else {
                $data['assignedCourses'] = null;
            }

            //Gets all the other courses not assigned to the current user
            if (!empty($otherCourses)) {
                $data['otherCourses'] = $otherCourses;
            } else {
                $data['otherCourses'] = null;
            }

            //Validates that the user is an admin, deny access otherwise
            if ($data['usertype'] != 'admin') {
                $this->session->set_flashdata('denied', 'You do not have permission to view this page.');
                redirect('home', 'refresh');
            } else {
                $this->load->view('header', $data);
                $this->load->view('view_manageUserCourse', $data);
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    //assign courses to a user
    function addCourses() {
    /**
     * Assigns courses to a user
     */
        $courseIDArray = $this->input->post('courseIDs');
        $userID = $this->input->post('userID');

        foreach ($courseIDArray as $courseID) {
            $this->model_usercourse->RegisterToCourse($userID, $courseID);
        }
    }

    //remove courses from a user
    function removeCourses() {
        $courseIDArray = $this->input->post('courseIDs');
        $userID = $this->input->post('userID');
        foreach ($courseIDArray as $courseID) {
            $this->model_usercourse->DropFromCourse($userID, $courseID);
        }
    }


    //Helpful function for printing to console. Evoke with $this->debugConsole(value);
    function debugConsole($data) {
    /**
     * Helpful function for printing to console. Evoke with $this->debugConsole(value);
     * @param $data
     */
        if (is_array($data)) {
            $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
        } else {
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

            echo $output;
        }
    }
}
?>
