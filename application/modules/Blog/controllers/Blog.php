<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->database();
        $this->load->model('model');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');
    }

    public function index($artikel = "")
    {
        $this->load->view('Layout/header');
        $this->load->view('blog');
        $this->load->view('Layout/footer');
    }

    public function DetailBlog($id_blog = "")
    {
        $data['vBlog']       = $this->db->query("SELECT * FROM v_blog_posted WHERE id_blog = '" . $id_blog . "' ")->row_array();
        $data['dataMaster']  = $this->model->View('v_m_product', 'id');
        $data['vColor']      = $this->model->View('v_color_image_selector', 'id');

        $this->load->view('Layout/header');
        $this->load->view('detailBlog', $data);
        $this->load->view('Layout/footer');
    }

    function fetch_data()
    {
        $config                     = array();
        $config["base_url"]         = "#";
        $config["total_rows"]       = $this->model->count_blog();
        $config["per_page"]         = 6;
        $config["uri_segment"]      = 4;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"]    = '<ul class="pagination pagination-page page-numbers">';
        $config["full_tag_close"]   = '</ul>';
        $config["first_tag_open"]   = '<li>';
        $config["first_tag_close"]  = '</li>';
        $config["last_tag_open"]    = '<li>';
        $config["last_tag_close"]   = '</li>';
        $config['next_link']        = '<i class="mdi mdi-chevron-right f-15"></i>';
        $config["next_tag_open"]    = '';
        $config["next_tag_close"]   = '';
        $config["prev_link"]        = '<i class="mdi mdi-chevron-left f-15"></i>';
        $config["prev_tag_open"]    = '';
        $config["prev_tag_close"]   = '';
        $config["cur_tag_open"]     = '<li><span class="page-numbers current">';
        $config["cur_tag_close"]    = '</span></li>';
        $config["num_tag_open"]     = '';
        $config["num_tag_close"]    = '';
        $config["num_links"]        = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(4);
        $start = ($page - 1) * 6;
        $output = array(
            'pagination_link'       =>    $this->pagination->create_links(),
            'blog'                =>    $this->model->get_search_blog($config["per_page"], $start)
        );

        echo json_encode($output);
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

    public function bg2911202101()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog8');
        $this->load->view('Layout/footer');
    }

    public function bg0912202101()
    {
        $this->load->view('Layout/header');
        $this->load->view('blog9');
        $this->load->view('Layout/footer');
    }
}
