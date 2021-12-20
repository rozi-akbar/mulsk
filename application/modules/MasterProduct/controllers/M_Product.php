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

    public function CreateProduct($action = "", $id = "")
    {
        $dataHeader['file'] = "Mulsk Product";

        if($action == "edit"){
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

    public function ProductIcon()
    {
        $this->load->view('Container/header');
        
        $this->load->view('Container/footer');
    }

    public function ProductDesc()
    {
        $this->load->view('Container/header');
        
        $this->load->view('Container/footer');
    }

    

    public function ListProduct($action = "", $id)
    {
        $this->load->view('Container/header');
        
        $this->load->view('Container/footer');
    }

    function previewProductPage($id = "")
    {
        $this->load->view('Container/header');
        
        $this->load->view('Container/footer');
    }
}