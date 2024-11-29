<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     public function insert_student($student_data) {
        // Check if student_data is not empty
        if (!empty($student_data)) {
            // Insert the student data into the 'students' table
            return $this->db->insert('student_info', $student_data);
        }
        return false;
    }
                                    
    // Fetch all students with pagination
    public function getStudents($limit = 10, $start = 0) {
        $this->db->limit($limit, $start);
        $this->db->where('status', 1);
        $query = $this->db->get('student_info');
        return $query->result_array();
    }

    // Count the total number of students
    public function countStudents() {
        $this->db->where('status', 1);
        return $this->db->count_all_results('student_info');
    }

    // Delete a student by ID
    public function deleteStudent($id) {
        $this->db->where('id', $id);
        $this->db->delete('student_info');
    }
}
