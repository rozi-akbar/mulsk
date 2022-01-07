<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class Blog extends CI_Controller
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

    public function DataBlog()
    {
        $dataHeader['file'] = "Data Blog Mulsk";
        $this->load->view('Container/header', $dataHeader);
        $this->load->view('dataBlog');
        $this->load->view('Container/footer');
    }

    public function T_DataBlog()
    {
        redirect(site_url('BlogAdmin/Blog/DataBlog'));
    }

    public function CreateBlog()
    {
        $UTC = new UTC;
        $create_date = $UTC->DateTimeStamp();
        $blog_id = date('YmdHis');
        $draftBlog = array(
            'id_blog'   => $blog_id,
            'create_at' => $create_date,
            'create_by' => $this->session->userdata('username_mulsk'),
            'draft'     => 1
        );
        // $data['blog_id'] = $blog_id;
        // $this->model->Insert('blog', $draftBlog);

        redirect(site_url('BlogAdmin/Blog/NewBlog/C/' . $blog_id));
    }

    public function NewBlog($action = "", $id)
    {
        $dataHeader['file'] = "Create Blog Mulsk";
        $data['blog_id'] = $id;

        if ($action == 'edit') {
            $data['data_blog']          = $this->model->Code("SELECT * FROM blog WHERE id = '" . $id . "' ");
            $getDataBlog                = $this->db->query("SELECT * FROM blog WHERE id = '" . $id . "' ")->row_array();
            $data['product_selected']   = $this->model->Code("SELECT * FROM v_blog_prod_selected WHERE m_blog_id = '" . $getDataBlog['id_blog'] . "' ");
        }
        $data['dataMaster']  = $this->model->View('v_m_product', 'id');

        $data['action'] = $action;

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('createBlog', $data);
        $this->load->view('Container/footer');
    }

    //Upload image summernote
    function upload_image($id = "")
    {
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = './assets/images/blog/content_images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/blog/content_images/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './assets/images/blog/content_images/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'assets/images/blog/content_images/' . $data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image($id = "")
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }

    function previewBlog($id = "")
    {
        $data['vBlog']          = $this->db->query("SELECT * FROM blog WHERE id = '" . $id . "' ")->row_array();
        $getId                  = $this->db->query("SELECT * FROM blog WHERE id = '" . $id . "' ")->row_array();
        $data['dataMaster']     = $this->model->ViewWhere('v_blog_prod_selected', 'm_blog_id', $getId['id_blog']);
        $data['vColor']         = $this->model->View('v_color_image_selector', 'id');

        $this->load->view('Container/headerLayoutBlog');
        $this->load->view('detailBlog', $data);
        $this->load->view('Container/footerLayoutBlog');
    }
}
