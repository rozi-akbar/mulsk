<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function index($artikel = "")
    {
        $this->load->view('Layout/header');
        $this->load->view('blog');
        $this->load->view('Layout/footer');
    }

    public function bg1206202101()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog1');
        $this->load->view('Layout/footer');
    }

    public function bg1206202102()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog2');
        $this->load->view('Layout/footer');
    }

    public function blog3()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog3');
        $this->load->view('Layout/footer');
    }
}
