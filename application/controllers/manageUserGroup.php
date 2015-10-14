<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageUserGroup extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('model_course');
        $this->load->model('model_user');
        $this->load->model('model_usercourse');
        $this->load->model('model_group');
        $this->load->model('model_usergroup');
    }

    function _remap() {
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
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['fname'] = $session_data['fname'];
            $data['lname'] = $session_data['lname'];
            $data['usertype'] = $session_data['usertype'];
            $data['menu'] = 'admin';

            $userID = $this->uri->segment(2); //get the current userID
            $thisUser = $this->model_user->GetUserByID($userID);
            $assignedGroups = $this->model_usergroup->GetUserGroups($userID); //Get groups the user is assigned to
            $omittedGroups = [];


            if (!empty($assignedGroups)) {
                foreach ($assignedGroups as $assignedGroup) {
                    array_push($omittedGroups, $assignedGroup['groupID']); //push in all the groups to be omitted
                }
                $otherGroups = $this->model_group->GetAllGroupsExcept($omittedGroups);//Get all groups not assigned to user
            }
            else {
                $otherGroups = $this->model_group->GetGroups();
            }

            //Gets the current user object
            if ($thisUser) {
                $data['thisUser'] = $thisUser;
            } else {
                $data['thisUser'] = null;
            }

            //Gets the current user's assigned group
            if ($assignedGroups) {
                $data['assignedGroups'] = $assignedGroups;
            } else {
                $data['assignedGroups'] = null;
            }

            //Gets all the other groups not assigned to the current user
            if (!empty($otherGroups)) {
                $data['otherGroups'] = $otherGroups;
            } else {
                $data['$otherGroups'] = null;
            }

            //Validates that the user is an admin, deny access otherwise
            if ($data['usertype'] != 'admin') {
                $this->session->set_flashdata('denied', 'You do not have permission to view this page.');
                redirect('home', 'refresh');
            } else {
                $this->load->view('header', $data);
                $this->load->view('view_manageUserGroup', $data);
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    //assign group to a user
    function addGroup() {
        $groupIDArray = $this->input->post('groupIDs');
        $userID = $this->input->post('userID');

        foreach ($groupIDArray as $groupID) {
            $this->model_usergroup->AddUserToGroup($userID, $groupID);
        }
    }

    //remove group from a user
    function removeGroup() {
        $groupIDArray = $this->input->post('groupIDs');
        $userID = $this->input->post('userID');
        foreach ($groupIDArray as $groupID) {
            $this->model_usergroup->RemoveUserFromGroup($userID, $groupID);
        }
    }

    //Helpful function for printing to console. Evoke with $this->debugConsole(value);
    function debugConsole($data) {
        if (is_array($data)) {
            $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
        } else {
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

            echo $output;
        }
    }
}
?>
