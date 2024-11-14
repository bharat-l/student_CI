<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel'); // Load the user model
        $this->load->library('session'); // Load session library
        $this->load->helper('url');      // Load URL helper for redirection
    }

    // Display the login page
    public function index() {
        $this->load->view('login_view'); // Load the login form view
        // $this->load->view('register_view');
    }

    // Handle the login form submission
    public function login() {
        // Get the entered username/email and password
        $input_username = trim($this->input->post('username'));
        $input_password = $this->input->post('password');

        // Basic validation for empty fields
        if (empty($input_username) || empty($input_password)) {
            $this->session->set_flashdata('error', 'Username or password cannot be empty.');
            redirect('LoginController');
            return;
        }

        // Authenticate the user via the model
        $user = $this->UserModel->authenticate($input_username, $input_password);

        if ($user) {
            // Set session variables for the logged-in user
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('user_name', $user['user_name']);

            // Redirect to the dashboard (or any protected page)
            redirect('StudentController');
        } else {
            // If authentication fails, redirect back to the login page with an error
            $this->session->set_flashdata('error', 'Invalid username or password!');
            redirect('LoginController');
        }
    }

    // Logout function
    public function logout() {
        $this->session->sess_destroy(); // Destroy the session
        redirect('LoginController');    // Redirect back to login page
    }
}

