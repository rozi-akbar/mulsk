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
}
