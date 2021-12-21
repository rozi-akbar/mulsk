<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class DatatablesProduct extends Datatables
{
    public function __construct()
    {
        parent::__construct();
    }

    public function DT_MasterProduct()
    {
        $table = 'v_m_product';
        $column_order = array('product_id', 'nama_product', 'created_at', 'created_by', 'update_at', 'update_by', null);
        $column_search = array('product_id', 'nama_product', 'created_at', 'created_by', 'update_at', 'update_by');
        $orderby = array('product_id' => 'desc');
        $list = $this->get_datatables($table, $column_order, $column_search, $orderby);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $row = array();
            $row[] = ++$no;

            $row[] = $person->nama_product;
            $row[] = $person->created_at;
            $row[] = $person->created_by;
            $row[] = $person->update_at;
            $row[] = $person->update_by;

            $row[] = '
            <div class="text-center">
                <a href="' . base_url() . 'MasterProduct/M_Product/CreateProductData/edit/' . $person->id . '">
                    <button title="Edit" class="btn btn-primary btn-icon">
                        <i class="fa fa-edit" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'MasterProduct/M_Product_Act/DeleteMasterProduct/' . $person->id . '">
                    <button title="Post" class="btn btn-danger btn-icon">
                        <i class="fa fa-trash"></i>
                    </button>
                </a>
            </div>
            ';

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
    }

    public function DT_ProductGallery()
    {
        $table = 'v_gallery';
        $column_order = array('m_product_id', 'nama_product', 'gallery_id', 'jml_gallery', 'url_image', 'created_at', 'created_by', 'update_at', 'update_by', null);
        $column_search = array('m_product_id', 'nama_product', 'gallery_id', 'jml_gallery', 'url_image', 'created_at', 'created_by', 'update_at', 'update_by');
        $orderby = array('m_product_id' => 'desc');
        $list = $this->get_datatables($table, $column_order, $column_search, $orderby);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $row = array();
            $row[] = ++$no;

            $row[] = $person->nama_product;
            $row[] = $person->jml_gallery;
            $row[] = $person->created_at;
            $row[] = $person->created_by;
            $row[] = $person->update_at;
            $row[] = $person->update_by;

            $row[] = '
            <div class="text-center">
                <a href="' . base_url() . 'BlogAdmin/Blog/previewBlog/' . $person->id . '">
                    <button title="Preview" class="btn btn-success btn-icon">
                        <i class="fa fa-eye" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'BlogAdmin/Blog/NewBlog/edit/' . $person->id . '">
                    <button title="Edit" class="btn btn-primary btn-icon">
                        <i class="fa fa-edit" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'BlogAdmin/Blog_Act/HiddenPost/' . $person->id . '">
                    <button title="Hidden Post" class="btn btn-danger btn-icon">
                        <i class="fa fa-arrow-alt-circle-down"></i>
                    </button>
                </a>
            </div>
            ';

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
    }

    public function hiddenBlog()
    {
        $table = 'v_hidden_blog';
        $column_order = array('title', 'create_at', 'create_by', 'hidden_at', 'hidden_by', null);
        $column_search = array('title', 'create_at', 'create_by', 'hidden_at', 'hidden_by');
        $orderby = array('id_blog' => 'desc');
        $list = $this->get_datatables($table, $column_order, $column_search, $orderby);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $row = array();
            $row[] = ++$no;

            $row[] = $person->title;
            $row[] = $person->create_at;
            $row[] = $person->create_by;
            $row[] = $person->posted_at;
            $row[] = $person->posted_by;
            $row[] = $person->hidden_at;
            $row[] = $person->hidden_by;

            $row[] = '
            <div class="text-center">
                <a href="' . base_url() . 'BlogAdmin/Blog/previewBlog/' . $person->id . '">
                    <button title="Preview" class="btn btn-success btn-icon">
                        <i class="fa fa-eye" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'BlogAdmin/Blog/NewBlog/edit/' . $person->id . '">
                    <button title="Edit" class="btn btn-primary btn-icon">
                        <i class="fa fa-edit" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'BlogAdmin/Blog_Act/Posting/' . $person->id . '">
                    <button title="Post" class="btn btn-warning btn-icon">
                        <i class="fa fa-arrow-alt-circle-up"></i>
                    </button>
                </a>
            </div>
            ';

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
    }
}
