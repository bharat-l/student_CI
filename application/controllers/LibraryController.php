<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibraryController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('header_view');
        // Load the library page with React
        $this->load->view('library_view');
        $this->load->view('footer_view');

    }
}
