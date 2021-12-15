<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
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
}
