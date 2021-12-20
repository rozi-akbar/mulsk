<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        $data['banner_home']    =   $this->model->Code('SELECT * FROM banner_home ORDER BY banner_id ASC');
        
        $this->load->view('Layout/header');
        $this->load->view('home', $data);
        $this->load->view('Layout/footer');
    }
}
