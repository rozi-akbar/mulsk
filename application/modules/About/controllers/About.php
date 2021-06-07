<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        $this->load->view('Layout/header');
        $this->load->view('about');
        $this->load->view('Layout/footer');
    }
}
