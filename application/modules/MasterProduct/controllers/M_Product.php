<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class M_Product extends CI_Controller
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

    public function ProductData()
    {
        $this->load->view('Container/header');
        $this->load->view('MasterProduct/dataProduct');
        $this->load->view('Container/footer');
    }

    public function T_ProductData()
    {
        redirect(site_url('MasterProduct/M_Product/ProductData'));
    }

    public function CreateProduct($action = "", $id = "")
    {
        $dataHeader['file'] = "Mulsk Product";

        if ($action == "edit") {
            $data['product']    = $this->model->ViewWhere('v_m_product', 'id', $id);
        }

        $data['action'] = $action;

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('MasterProduct/createProduct', $data);
        $this->load->view('Container/footer');
    }

    public function T_CreateProduct()
    {
        redirect(site_url('MasterProduct/M_Product/CreateProduct'));
    }

    public function CreateProductData($id = "")
    {

        $getData = $this->db->query("SELECT * FROM m_product WHERE id = '" . $id . "' ")->row_array();
        $dataHeader['file'] = "Create Product Data " . $getData['nama_product'];

        $data['dataMaster']         = $this->model->ViewWhere('m_product', 'id', $id);
        $data['product_gallery']    = $this->model->ViewWhere('product_gallery', 'm_product_id', $getData['product_id']);
        $data['product_icon']       = $this->model->ViewWhere('product_icon', 'm_product_id', $getData['product_id']);

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('MasterProduct/createProductData', $data);
        $this->load->view('Container/footer');
    }

    public function T_CreateProductData($id = "")
    {
        redirect(site_url('MasterProduct/M_Product/CreateProductData/' . $id));
    }

    public function Edit_Gallery($id_master = "", $id_gallery = "", $nama_product = "")
    {
        $dataHeader['file']     = "Edit Gallery " . str_replace('%20', ' ', $nama_product);
        $data['productName']    = $nama_product;
        $data['id_master']      = $id_master;
        $data['data_gallery']   = $this->db->query("SELECT * FROM product_gallery WHERE id = '" . $id_gallery . "' ")->row_array();

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('MasterProduct/editGallery', $data);
        $this->load->view('Container/footer');
    }

    public function EditProducticon($id_master = "", $id_icon = "", $nama_product = "")
    {
        $dataHeader['file']         = "Edit Product Icon " . str_replace('%20', ' ', $nama_product);
        $data['productName']        = $nama_product;
        $data['id_master']          = $id_master;
        $data['data_product_icon']  = $this->db->query("SELECT * FROM product_icon WHERE id = '" . $id_icon . "' ")->row_array();

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('MasterProduct/editProductIcon', $data);
        $this->load->view('Container/footer');
    }

    public function ListProduct($action = "", $id)
    {
        $this->load->view('Container/header');

        $this->load->view('Container/footer');
    }

    function PreviewProductPage($id = "")
    {
        $this->load->view('Container/header');

        $this->load->view('Container/footer');
    }
}
