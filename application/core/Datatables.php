<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatables extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->database();
    }

    public function _get_datatables_query($table, $column_order, $column_search, $orderby)
    {
        $this->db->from($table);
        $i = 0;

        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($orderby)) {
            $order = $orderby;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($table, $column_order, $column_search, $orderby)
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $orderby);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($table, $column_order, $column_search, $orderby)
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $orderby);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id, $table)
    {
        $this->db->from($table);
        $this->db->where('member_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function soft_delete($id) //soft delete
    {
        $data = array(
            'is_deleted'    => 1,
            'deleted_at'    => date('Y-m-d H:i:s'),
            'deleted_by'    => $this->session->userdata('username_mulsk')
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    // public function delete_by_id($id)
    // {
    // 	$this->db->where('id', $id);
    // 	$this->db->delete($this->table);
    // }
}


//Example Function call datatables 
/*
        $table = 'view_table';
        $column_order = array('column, 'column', 'column', 'column', null);
        $column_search = array('column, 'column', 'column', 'column');
        $orderby = array('column' => 'desc');
        $list = $this->get_datatables($table, $column_order, $column_search, $orderby);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $row = array();
            $row[] = ++$no;

            $row[] = $person->column;
            $row[] = $person->column;
            $row[] = $person->column;
            $row[] = $person->column;
            $row[] = $person->column;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->count_all($table),
            "recordsFiltered" => $this->count_filtered($table, $column_order, $column_search, $orderby),
            "data" => $data,
        );
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($output, JSON_PRETTY_PRINT);
*/
