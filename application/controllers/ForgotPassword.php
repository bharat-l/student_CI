<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{
    public function index()
    {
        // Load the forgot password view
        $this->load->view('ForgotPassword');
    }

    public function submit_email()
    {
        $email = $this->input->post('email', true);

        if (empty($email)) {
            // Respond with validation error
            echo json_encode(['status' => 'error', 'message' => 'Please enter your email address.']);
        } else {
            // Here you would typically handle the password reset logic
            // Example: Check if email exists, send reset link, etc.
            // For demonstration, returning success
            echo json_encode(['status' => 'success', 'message' => $email]);
        }
    }
}
