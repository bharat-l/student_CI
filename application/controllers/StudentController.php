<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->library('session');
        
        // Check if user is logged in
        // if (!$this->session->userdata('user_id')) {
        //     redirect('login_view.php');
        // }
    }

    // Display student data
    public function index() {
        $data['students'] = $this->StudentModel->getStudents();
        $data['total_rows'] = $this->StudentModel->countStudents();
        $this->load->view('header_view');
        $this->load->view('students_view', $data);
        $this->load->view('footer_view');
    }

    // Function for deleting a student record
    public function delete($id) {
        $this->StudentModel->deleteStudent($id);
        redirect('StudentController');
    }
}
