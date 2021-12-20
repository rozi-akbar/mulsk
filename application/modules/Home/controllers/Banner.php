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
    public function index($Aksi = "", $Id = "")
    {
        $dataHeader['file']     = "Data Home Banner Mulsk";
        $dataHeader['title']    = "Data Home Banner - Mulsk";

        $data['action']		    = $Aksi;
        $data['home_banner']    = $this->model->Code('SELECT * FROM banner_home ORDER BY banner_id ASC');

		if ($Aksi == 'Update') {
			$data['field']      = $this->model->Code("SELECT * FROM banner_home where is_deleted = 0 and banner_id = '" . $Id . "';");
		}

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('banner_data', $data);
        $this->load->view('Container/footer');
    }
    //Show Interface function - End==========================================================================

    //Action function - Begin================================================================================
    public function Crud($Aksi = "", $Id = "")
    {
        //config for desktop
		$file_ext 					= pathinfo($_FILES["image_desktop"]["name"], PATHINFO_EXTENSION);
		$file_name  				= date("ymdhis") . uniqid() . '.' . $file_ext;

		//config for mobile
		$file_ext_mobile 			= pathinfo($_FILES["image_mobile"]["name"], PATHINFO_EXTENSION);
		$file_name_mobile  			= date("ymdhis") . uniqid() . '.' . $file_ext_mobile;

		if ($Aksi == 'Insert') {
			$this->upload_files($file_name, 'image_desktop');
			$this->upload_files($file_name_mobile, 'image_mobile');

			$data = array(
				'banner_desktop'    => $file_name,
				'banner_mobile'		=> $file_name_mobile,
				'is_deleted'		=> '0',
				'add_by'		    => $this->session->userdata('username_mulsk'),
				'add_date'          => date('Y-m-d H:i:s')
			);

			$this->model->Insert('banner_home', $data);
			redirect(site_url('Home/Banner'));
		} else if ($Aksi == 'Update') {
			if(!empty($_FILES['image_desktop']['name'])){
				unlink('assets/images/banner/' . $this->input->post('image_desktop_edit'));
				$image_desktop = $file_name;
				$this->upload_files($file_name, 'image_desktop');
			} else{
				$image_desktop = $this->input->post('image_desktop_edit');
			}

			if(!empty($_FILES['image_mobile']['name'])){
				unlink('assets/images/banner/' . $this->input->post('image_mobile_edit'));
				$image_mobile = $file_name_mobile;
				$this->upload_files($file_name_mobile, 'image_mobile');
			} else{
				$image_mobile = $this->input->post('image_mobile_edit');
			}

			$data = array(
				'banner_desktop'    => $image_desktop,
				'banner_mobile'	    => $image_mobile,
				'update_date'			=> date('Y-m-d H:i:s'),
				'update_by'			=> $this->session->userdata('username_mulsk')
			);

			$this->model->Update('banner_home', 'banner_id', $Id, $data);
			redirect(site_url('Home/Banner'));
		} else if ($Aksi == 'Delete') {
			$data_delete = array(
				'is_deleted'	=> '1',
				'delete_by'		=> $this->session->userdata('username_mulsk'),
				'delete_date'		=> date('Y-m-d')
			);

			$this->model->Update('banner_home', 'id_banner', $Id, $data_delete);
			redirect(site_url('Home/Banner'));
		}
    }

    private function upload_files($fileName, $field)
    {
        $config = array(
            'upload_path'   => './assets/images/banner/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_sizes'     => 1000,
            'file_name'     => $fileName
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
