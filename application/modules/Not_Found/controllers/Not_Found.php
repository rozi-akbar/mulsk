<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Not_Found extends CI_Controller
{
    public function index()
    {
        $this->load->view('Layout/header');
        $this->load->view('not_found');
        $this->load->view('Layout/footer');
    }
}
