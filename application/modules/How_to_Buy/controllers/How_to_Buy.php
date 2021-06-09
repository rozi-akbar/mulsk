<?php
defined('BASEPATH') or exit('No direct script access allowed');

class How_to_Buy extends CI_Controller
{
    public function index()
    {
        $this->load->view('Layout/header');
        $this->load->view('how');
        $this->load->view('Layout/footer');
    }
}
