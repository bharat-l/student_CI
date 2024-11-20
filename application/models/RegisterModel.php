<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    /**
     * Register a new user
     *
     * @param array $data Associative array containing user data to be inserted.
     * @return bool True if insertion is successful, false otherwise.
     */
    public function register_user($data) {
        // Hash the password before storing it
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        // Insert user data into the database
        if ($this->db->insert('register_user', $data)) {
            return true;
        } else {
            // Log the error if insertion fails
            log_message('error', 'User registration failed: ' . $this->db->error()['message']);
            return false;
        }
    }
}
