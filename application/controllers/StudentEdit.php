<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentEdit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EditModel');
        $this->load->library('session');
    }

    // Display the student edit form
    public function edit($id = null) {
        if ($id === null) {
            show_error('No student ID provided!', 400);
        }

        $data['student'] = $this->EditModel->get_student_by_id($id);
        if (!$data['student']) {
            show_error('Student not found!', 404);
        }
        $this->load->view('header_view');
        $this->load->view('edit_view', $data);
        $this->load->view('footer_view');
       
    }

    // Update student data
    public function update() {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $update_data = [
                'student_name' => $this->input->post('StudentName', true),
                'Father_name'  => $this->input->post('FatherName', true),
                'gender'       => $this->input->post('gender',true),
                'Date_of_birth' => $this->input->post('Date_of_birth',true),
                'address'      => $this->input->post('Address', true),
                'phone_number' => $this->input->post('Phnumber', true),
                'marks'        => $this->input->post('Marks', true),
                'email_address'=> $this->input->post('Email', true),
            ];

            $result = $this->EditModel->update_student($id, $update_data);

            if ($result) {
                $this->session->set_flashdata('success', 'Student data updated successfully!');
                redirect('studentController'); // Redirect to the list or another page
            } else {
                $this->session->set_flashdata('error', 'Failed to add student. Please try again.');
                $data['error'] = 'Error updating record.';
                $data['student'] = $update_data;
                $this->load->view('student_edit', $data);
            }
        }
    }
}