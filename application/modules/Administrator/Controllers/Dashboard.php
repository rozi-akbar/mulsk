<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');
    }

    public function index(){
        $this->load->view('container/header');
        $this->load->view('adminPage/Dashboard');
        $this->load->view('container/footer');
    }
}
