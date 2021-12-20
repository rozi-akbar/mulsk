<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }
    //Show Interface function - Begin========================================================================
    public function index()
    {
        $dataHeader['file'] = "Data Home Banner Mulsk";
        $dataHeader['title'] = "Data Home Banner - Mulsk";

        $data['home_banner']    =   $this->model->View('banner_home', 'banner_id');
        $this->load->view('Container/header', $dataHeader);
        $this->load->view('banner_data', $data);
        $this->load->view('Container/footer');
    }

    public function Input()
    {
        $dataHeader['file'] = "Home Banner";
        $dataHeader['title'] = "Input Home Banner - Mulsk";

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('banner_input');
        $this->load->view('Container/footer');
    }
    //Show Interface function - End==========================================================================

    //Action function - Begin================================================================================
    public function Insert()
    {
        //config for desktop
        $file_ext                     = pathinfo($_FILES["image_desktop"]["name"], PATHINFO_EXTENSION);
        $file_name                  = date("ymdhis") . uniqid() . '.' . $file_ext;

        //config for mobile
        $file_ext_mobile             = pathinfo($_FILES["image_mobile"]["name"], PATHINFO_EXTENSION);
        $file_name_mobile              = date("ymdhis") . uniqid() . '.' . $file_ext_mobile;

        $this->upload_files($file_name, 'image_desktop');
        $this->upload_files($file_name_mobile, 'image_mobile');

        $data = array(
            'banner_desktop'        => $file_name,
            'banner_mobile'         => $file_name_mobile,
            'is_deleted'            => '0',
            'add_by'            => $this->session->userdata('username'),
            'created_at'            => date('Y-m-d H:i:s')
        );

        $this->model->Insert('home_banner', $data);
        redirect(site_url('Administrator/show/home_banner/I'));
    }

    private function upload_files($fileName, $field)
    {
        $config = array(
            'upload_path'    => './assets/media/banner/',
            'allowed_types'    => 'jpg|jpeg|png',
            'max_sizes'        => 1000,
            'file_name'        => $fileName
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($field)) {
            $this->upload->data();
        } else {
            return false;
        }
    }
    //Action function - End==================================================================================
}
