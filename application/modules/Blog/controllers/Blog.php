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

    public function bg1206202103()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog3');
        $this->load->view('Layout/footer');
    }

    public function bg1506202101()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog4');
        $this->load->view('Layout/footer');
    }

    public function bg1506202102()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog5');
        $this->load->view('Layout/footer');
    }

    public function bg1506202103()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog6');
        $this->load->view('Layout/footer');
    }

    public function bg1511202101()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog7');
        $this->load->view('Layout/footer');
    }
}
