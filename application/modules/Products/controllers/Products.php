<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function index()
    {
        $this->load->view('Layout/header');
        $this->load->view('products');
        $this->load->view('Layout/footer');
    }

    public function mulberrysilkpillowcase()
    {
        $this->load->view('Layout/header');
        $this->load->view('products-pillowcase');
        $this->load->view('Layout/footer');
    }

    public function luxurygiftset()
    {
        $this->load->view('Layout/header');
        $this->load->view('products-gift');
        $this->load->view('Layout/footer');
    }

    public function mulberrysilkfacemask()
    {
        $this->load->view('Layout/header');
        $this->load->view('products-face-mask');
        $this->load->view('Layout/footer');
    }

    public function mulberrysilkscrunchie()
    {
        $this->load->view('Layout/header');
        $this->load->view('products-silk-scrunchie');
        $this->load->view('Layout/footer');
    }
}
