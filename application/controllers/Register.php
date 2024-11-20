<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RegisterModel');
    }

    public function index() {
        $this->load->view('register_view');
    }

    public function register_user() {
        // Load form helper and library
        $this->load->helper('url');
        $this->load->library('form_validation');

        // Set form validation rules
        // $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required|min_length[3]|max_length[28]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phnumber', 'Phone Number', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the registration page with errors
            $this->load->view('register_view');
        } else {
            // If validation passes, prepare data for insertion
            $data = array(
                // 'name' => $this->input->post('name'),
                'user_name' => $this->input->post('username'),
                'email_address' => $this->input->post('email'),
                'phone_number' => $this->input->post('phnumber'),
                'password' => $this->input->post('password'),
                'gender' => $this->input->post('gender')
            );

            if ($this->RegisterModel->register_user($data)) {
                redirect('register?success=Registration successful');
            } else {
                redirect('register?error=Registration failed. Please try again.');
            }
        }
    }
}
