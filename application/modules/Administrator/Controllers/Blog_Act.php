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

        redirect(site_url('Administrator/Blog/T_DataBlog'));
    }

    function UpdateBlog($id = "")
    {
        $UTC = new UTC;
        $title = $this->input->post('title', TRUE);
        $contents = $this->input->post('contents', TRUE);
        $data = array(
            'title'     => $title,
            'content'   => $contents,
            'update_at'   => $UTC->DateTimeStamp(),
            'update_by' => $this->session->userdata('username')
        );
        $this->model->Update('blog', 'id_blog', $id, $data);

        redirect(site_url('Administrator/Blog/T_DataBlog'));
    }

    function Posting($id = "")
    {
        $UTC = new UTC;
        $data = array(
            'draft'       => 0,
            'posted'      => 1,
            'posted_at'   => $UTC->DateTimeStamp(),
            'posted_by'   => $this->session->userdata('username')
        );
        $this->model->Update('blog', 'id', $id, $data);

        redirect(site_url('Administrator/Blog/T_DataBlog'));
    }

    function HiddenPost($id = "")
    {
        $UTC = new UTC;
        $data = array(
            'posted'     => 2,
            'hidden_at'   => $UTC->DateTimeStamp(),
            'hidden_by'   => $this->session->userdata('username')
        );
        $this->model->Update('blog', 'id', $id, $data);

        redirect(site_url('Administrator/Blog/T_DataBlog'));
    }
}
