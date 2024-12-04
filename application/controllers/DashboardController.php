<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model'); // Load the student model
    }

    public function index() {
        $this->load->view('header_view');
        $student_id = 'S123456'; // In a real scenario, you would get this from session or URL
        $data['student_data'] = $this->Dashboard_model->get_student_data($student_id);
        $this->load->view('dashboard_view', $data); // Pass the data to the view
        $this->load->view('footer_view');
    }
}