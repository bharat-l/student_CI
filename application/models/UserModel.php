<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    /**
     * Authenticate user by username/email and password.
     *
     * @param string $username_or_email Username or email provided by the user.
     * @param string $password Password provided by the user.
     * @return array|bool User data array on success, false on failure.
     */
    public function authenticate($username_or_email, $password) {
        // Query to find user by username or email
        $this->db->where("(user_name = '$username_or_email' OR email_address = '$username_or_email')", NULL, FALSE);
        $query = $this->db->get('register_user');

        if ($query->num_rows() == 1) {
            $user = $query->row_array();

            // Verify the hashed password
            if (password_verify($password, $user['password'])) {
                unset($user['password']); // Remove the password from the returned data for security
                return $user; // Return user data if authentication is successful
            } else {
                return false; // Password verification failed
            }
        } else {
            return false; // User not found
        }
    }
}
