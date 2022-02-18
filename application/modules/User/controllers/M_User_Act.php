<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class M_User_Act extends CI_Controller
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
        $UTC = new UTC;

        $this->db->trans_start();

        if ($aksi == "Insert") {
            if (empty($this->input->post('active')) || $this->input->post('active') == "") {
                $active = 0;
            } else {
                $active = 1;
            }

            if (empty($this->input->post('cPassword')) || $this->input->post('cPassword') == "") {
                $data = array(
                    'name'      => $this->input->post('cNama'),
                    'username'  => $this->input->post('cUsername'),
                    'level'     => $this->input->post('cLevel'),
                    'active'    => $active,
                    'add_by'    => $this->session->userdata('username_mulsk'),
                    'add_date'  => $UTC->DateTimeStamp()
                );
            } else {
                $data = array(
                    'name'      => $this->input->post('cNama'),
                    'username'  => $this->input->post('cUsername'),
                    'password'  => hash('sha256', md5($this->input->post('cPassword'))),
                    'level'     => $this->input->post('cLevel'),
                    'active'    => $active,
                    'add_by'    => $this->session->userdata('username_mulsk'),
                    'add_date'  => $UTC->DateTimeStamp()
                );
            }
            $this->model->Insert('user', $data);

            $dataTemp = array(
                'id_user'   => $this->db->insert_id(),
                'pass'  => $this->input->post('cPassword')
            );
            $this->model->Insert('temp', $dataTemp);
        } elseif ($aksi == "Update") {
            if (empty($this->input->post('active')) || $this->input->post('active') == "") {
                $active = 0;
            } else {
                $active = 1;
            }
            if (empty($this->input->post('cPassword')) || $this->input->post('cPassword') == "") {
                $data = array(
                    'name'      => $this->input->post('cNama'),
                    'username'  => $this->input->post('cUsername'),
                    'level'     => $this->input->post('cLevel'),
                    'active'    => $active,
                    'add_by'    => $this->session->userdata('username_mulsk'),
                    'add_date'  => $UTC->DateTimeStamp()
                );
                $dataTemp = array(
                    'pass'  => $this->input->post('cPassword')
                );
            } else {
                $data = array(
                    'name'      => $this->input->post('cNama'),
                    'username'  => $this->input->post('cUsername'),
                    'password'  => hash('sha256', md5($this->input->post('cPassword'))),
                    'level'     => $this->input->post('cLevel'),
                    'active'    => $active,
                    'add_by'    => $this->session->userdata('username_mulsk'),
                    'add_date'  => $UTC->DateTimeStamp()
                );
                $dataTemp = array(
                    'pass'  => $this->input->post('cPassword')
                );
            }
            $this->model->Update('user', 'id', $id, $data);
            $this->model->Update('temp', 'id_user', $id, $dataTemp);
        } elseif ($aksi == "Delete") {
            $data = array(
                'is_delete' => 1,
                'delete_date'    => $UTC->DateTimeStamp(),
                'delete_by'    => $this->session->userdata('username_mulsk')
            );

            $this->model->Update('user', 'id', $id, $data);
        } else {
            redirect(site_url('User/M_User/T_CreateUser'));
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('User/M_User/T_CreateUser'));
        } else {
            redirect(site_url('User/M_User/T_CreateUser'));
        }
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
