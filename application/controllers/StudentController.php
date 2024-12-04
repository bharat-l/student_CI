<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->library('session');
        $this->load->helper('form', 'url');
        // $this->load->helper('url');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('LoginController'); // Redirect only if the user is not logged in
        }
        
    }

    // Display student data
    public function index() {
        $data['students'] = $this->StudentModel->getStudents();
        $data['total_rows'] = $this->StudentModel->countStudents();
        $this->load->view('header_view');
        $this->load->view('students_view', $data);
        $this->load->view('footer_view');
    }
    public function insert_student() {
        // Get data from form input
        $student_data = array(
            'student_name' => $this->input->post('StudentName',true),
            'Father_name' => $this->input->post('FatherName',true),
            'address' => $this->input->post('Address'),
            'phone_number' => $this->input->post('Phnumber'),
            'marks' => $this->input->post('Marks'),
            'email_address' => $this->input->post('Email')
            
            
        );

        // Call the insert function in the StudentModel
        $inserted = $this->StudentModel->insert_student($student_data);

        if ($inserted) {
            // Redirect to the students list page (or any other page after success)
            redirect('studentcontroller');
        } else {
            // Display an error message or log the error
            $this->session->set_flashdata('error', 'Failed to add student. Please try again.');
            redirect('studentcontroller');
        }
    }

    // Function for deleting a student record
    public function delete($id) {
        $this->StudentModel->deleteStudent($id);
        redirect('StudentController');
    }
}
