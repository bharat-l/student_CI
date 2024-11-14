<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function check_existing_user($user_name, $phone_number, $email) {
        // Check if the username, phone number, or email already exists
        $this->db->where('user_name', $user_name);
        $this->db->or_where('phone_number', $phone_number);
        $this->db->or_where('email_address', $email);

        $query = $this->db->get('register_user');
        return $query->row_array();
    }

    public function register_user($data) {
        return $this->db->insert('register_user', $data);
    }
}
