<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fetch student data (simulated here as mock data)
    public function get_student_data($student_id) {
        // In a real scenario, you would use this to fetch data from the database
        return [
            'name' => 'John Doe',
            'student_id' => 'S123456',
            'email' => 'john.doe@example.com',
            'courses' => [
                ['id' => 1, 'name' => 'Mathematics 101', 'grade' => 'A'],
                ['id' => 2, 'name' => 'Physics 101', 'grade' => 'B+'],
                ['id' => 3, 'name' => 'Computer Science 101', 'grade' => 'A-']
            ],
            'notifications' => [
                'Assignment due for Math 101 on Friday.',
                'New grade posted for Physics 101.',
                'Don\'t forget to register for the Spring Semester!'
            ]
        ];
    }
}
