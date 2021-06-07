<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	//Show =========================================================================================>>
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}

	public function index($Aksi = '')
	{
		$data['file'] = 'Dashboard';

		if ($this->session->userdata('level_seller') == 1) {
			$this->load->view('Layout/header');
			$this->load->view('dashboard', $data);
			$this->load->view('Layout/footer');
		} else {
			$this->load->view('Layout/header_pwa');
			$this->load->view('dashboard2', $data);
			$this->load->view('Layout/footer_pwa');
		}
	}

	//Action =======================================================================================>>

}
