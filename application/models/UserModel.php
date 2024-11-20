<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usermodel extends CI_Model {
    public function authenticate($username_or_email, $password){
        $hashed_password = md5($password);
        $this->db->where("(user_name= '$username_or_email' OR email_address = '$username_or_email')",NULL,FALSE);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('register_user');
        if($query->num_rows() == 1){
            return $query->row_array();
        }
        else{
            return false;
        }
        
    }
}
?>