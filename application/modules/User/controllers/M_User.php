<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class M_User extends CI_Controller
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

    public function CreateUser($aksi = "", $id = "")
    {
        if ($aksi == "edit") {
            $data['data_user']        = $this->db->query("SELECT * FROM v_create_user WHERE id = '" . $id . "' ")->row_array();
            $data['get_pass']       = $this->db->query("SELECT * FROM temp WHERE id_user = '" . $id . "' ")->row_array();
        }
        $data['data_user_table']    = $this->model->View('v_create_user', 'id');
        $data['action']                = $aksi;

        $dataHeader['file']           = 'Create User Data';
        $dataHeader['data_level']   = $this->model->View('m_level', 'id');

        $this->load->view('Container/header', $dataHeader);
        $this->load->view('User/createUser', $data);
        $this->load->view('Container/footer');
    }

    public function T_CreateUser()
    {
        redirect(site_url('User/M_User/CreateUser'));
    }

    public function MaintenanceUser()
    {
        $this->load->view('Container/header');
        $this->load->view('User/maintenanceUser');
        $this->load->view('Container/footer');
    }

    public function T_MaintenanceUser()
    {
        redirect(site_url('User/M_User/MaintenanceUser'));
    }

    public function check_username()
    {
        header('Access-Control-Allow-Origin: *');

        $check_username = $this->db->query("SELECT username FROM user WHERE username = '" . strtolower($_POST['username']) . "' ");

        if ($check_username->num_rows() > 0) {
            $data = "Not Valid";
        } else {
            foreach ($check_username->result_array() as $vaData) {
                $username = $vaData['username'];
                $data = "$username";
            }
        }

        echo $data;
        return $data;
    }
}
