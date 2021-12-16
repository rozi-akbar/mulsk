<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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

    //convert string to md5 and sha256 hashing
    public function sha256_md5($String)
    {
        return hash('sha256', md5($String));
    }

    //encrypt string message or text with key
    public function safeEncrypt($message, $key)
    {
        return openssl_encrypt($message, "AES-128-ECB", $key);
    }

    //decrypt string message or text with key
    public function safeDecrypt($encrypted, $key)
    {
        return openssl_decrypt($encrypted, "AES-128-ECB", $key);
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
        $pass = $this->sha256_md5($this->input->post('password'));

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

    public function Auth($username, $pass)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $pass);
        $this->db->select("*");
        $db = $this->db->get("v_user");
        if ($Row = $db->row_array()) {
            $output = array(
                'status'        => TRUE,
                'id'         => $Row['id'],
                'level'         => $Row['level'],
                'username'      => $Row['username'],
                'nama'          => $Row['name'],
                'nama_level'    => $Row['nama_level'],
            );
            // header('Content-Type: application/json; charset=utf-8');
            return json_encode($output, JSON_PRETTY_PRINT);
        } else {
            $output = array(
                'status' => FALSE
            );
            // header('Content-Type: application/json; charset=utf-8');
            return json_encode($output, JSON_PRETTY_PRINT);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('Administrator/Login/LoginPage'));
    }
}
