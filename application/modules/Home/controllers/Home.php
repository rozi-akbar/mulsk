<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('Layout/header');
        $this->load->view('home');
        $this->load->view('Layout/footer');
    }
}
