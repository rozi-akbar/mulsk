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
        $data['banner_home']    = $this->model->Code('SELECT * FROM banner_home WHERE is_deleted = 0 ORDER BY banner_id ASC');
        $data['vBlog']          = $this->model->View('v_blog_posted', 'id');
        $data['dataMaster']     = $this->model->View('v_m_product', 'id');
        $data['vColor']      = $this->model->View('v_color_image_selector', 'id');

        $this->load->view('Layout/header');
        $this->load->view('home', $data);
        $this->load->view('Layout/footer');
    }
}
