<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class Login extends Authentication
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');
    }

    public function LoginPage($Action = "")
    {

        if ($Action == "error") {
            $data['notif'] = "Username / Password Salah";
        } else {
            $data['notif'] = "";
        }
        $this->load->view('login', $data);
    }

    public function AuthLogin()
    {
        $hash = new Hash;
        $pass = $hash->sha256_md5($this->input->post('password'));

        $get_status = json_decode($this->Auth($this->input->post('username'), $pass), true);

        if ($get_status['status'] == 1) {
            $this->session->set_userdata('isLogin', $get_status['username']);
            $this->session->set_userdata('id_user', $get_status['id']);
            $this->session->set_userdata('username', $get_status['username']);
            $this->session->set_userdata('nama_user', $get_status['nama']);
            $this->session->set_userdata('level', $get_status['level']);
            $this->session->set_userdata('nama_level', $get_status['nama_level']);

            redirect(site_url('Administrator/Dashboard'));
        } else {
            redirect(site_url('Administrator/Login/LoginPage/error'));
        }
    }

    public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('Administrator/Login/LoginPage'));
	}
}
