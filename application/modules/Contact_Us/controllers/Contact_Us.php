<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_Us extends CI_Controller
{
    public function index()
    {
        $this->load->view('Layout/header');
        $this->load->view('contact');
        $this->load->view('Layout/footer');
    }
}
