<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class Blog_Act extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->database();
        $this->load->model('model');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');
    }

    function save($id = "")
    {
        $title = $this->input->post('title', TRUE);
        $contents = $this->input->post('contents', TRUE);
        $data = array(
            'title'     => $title,
            'content'   => $contents
        );
        $this->model->Update('blog', 'id_blog', $id, $data);

        // $id = $this->db->insert_id();
        // $result = $this->post_model->get_article_by_id($id)->row_array();
        $dataBlog = $this->db->query("SELECT * FROM blog WHERE id_blog = '" . $id . "' ")->row_array();
        $data['title'] = $dataBlog['title'];
        $data['contents'] = $dataBlog['content'];
        $this->load->view('container/header');
        $this->load->view('adminPage/DetailBlog', $data);
        $this->load->view('container/footer');
    }
}
