<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
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

    public function index()
    {
        $data['dataMaster']  = $this->model->View('v_m_product', 'id');
        $data['vColor']      = $this->model->View('v_color_image_selector', 'id');

        $this->load->view('Layout/header');
        $this->load->view('products', $data);
        $this->load->view('Layout/footer');
    }

    public function detailProduct($id = "")
    {

        $getData = $this->db->query("SELECT * FROM m_product WHERE id = '" . $id . "' ")->row_array();

        $data['dataMaster']             = $this->model->ViewWhere('v_m_product', 'id', $id);
        $data['product_gallery']        = $this->model->ViewWhere('v_product_gallery', 'm_product_id', $getData['product_id']);
        $data['product_icon']           = $this->model->ViewWhere('v_product_icon', 'm_product_id', $getData['product_id']);
        $data['color_image_selector']   = $this->model->ViewWhere('v_color_image_selector', 'm_product_id', $getData['product_id']);

        $this->load->view('Layout/header');
        $this->load->view('detailProduct', $data);
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
