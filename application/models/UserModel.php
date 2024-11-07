<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    // Function to authenticate the user
    public function authenticate($username_or_email, $password) {
        // Hash the password using md5 (consider using stronger hashing methods like password_hash)
        $hashed_password = md5($password);

        // Prepare the query to check for username or email and password match
        $this->db->where('user_name', $username_or_email);
        $this->db->or_where('email_address', $username_or_email);
        $this->db->where('password', $hashed_password);

        $query = $this->db->get('register_user');

        // If a matching user is found, return user data
        if ($query->num_rows() == 1) {
            return $query->row_array(); // Return user data as an associative array
        } else {
            return false; // No match found
        }
    }
}
