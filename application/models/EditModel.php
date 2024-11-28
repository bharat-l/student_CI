<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fetch a student by ID
    public function get_student_by_id($id) {
        return $this->db->get_where('student_info', ['id' => $id])->row_array();
    }

    // Update student data
    public function update_student($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('student_info', $data);
    }
}
