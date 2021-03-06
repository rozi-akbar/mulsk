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
        $column_order = array('product_id', 'nama_product', 'price', 'created_at', 'created_by', 'update_at', 'update_by', null);
        $column_search = array('product_id', 'nama_product', 'price', 'created_at', 'created_by', 'update_at', 'update_by');
        $orderby = array('product_id' => 'desc');
        $list = $this->get_datatables($table, $column_order, $column_search, $orderby);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $row = array();
            $row[] = ++$no;

            $row[] = $person->nama_product;
            $row[] = $person->price;
            $row[] = $person->created_at;
            $row[] = $person->created_by;
            $row[] = $person->update_at;
            $row[] = $person->update_by;

            $row[] = '
            <div class="text-center">
                <a href="' . base_url() . 'MasterProduct/M_Product/CreateProduct/edit/' . $person->id . '">
                    <button title="Edit" class="btn btn-primary btn-icon">
                        <i class="fa fa-edit" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'MasterProduct/M_Product_Act/CreateMasterProduct/Delete/' . $person->id . '">
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

    public function DT_ProductData()
    {
        $table = 'v_product_data';
        $column_order = array('id', 'product_id', 'nama_product', 'price', 'publish', 'published_at', 'deskripsi', 'benefits', 'wash_care', 'total_gallery', 'total_product_icon', null);
        $column_search = array('id', 'product_id', 'nama_product', 'price', 'publish', 'published_at', 'deskripsi', 'benefits', 'wash_care', 'total_gallery', 'total_product_icon');
        $orderby = array('id' => 'desc');
        $list = $this->get_datatables($table, $column_order, $column_search, $orderby);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $row = array();
            $row[] = ++$no;

            $teks_deskripsi = substr($person->deskripsi, 0, 50);
            $teks_benefits = substr($person->benefits, 0, 50);
            $status_publish = "";
            if($person->publish == 0){
                $status_publish = '<span class="text-warning"> <u> Waiting </u> </span>';
            }elseif($person->publish == 1){
                $status_publish = '<span class="text-success"> <u> Published </u> </span>';
            }else{
                $status_publish = "Unknown";
            }

            $row[] = $person->nama_product;
            $row[] = $person->price;
            $row[] = $teks_deskripsi;
            $row[] = $teks_benefits;
            $row[] = $person->total_gallery;
            $row[] = $person->total_product_icon;
            $row[] = $status_publish;
            $row[] = $person->published_at;

            $row[] = '
            <div class="text-center">
                <a href="' . base_url() . 'MasterProduct/M_Product/PreviewProductPage/' . $person->id . '">
                    <button title="Preview" class="btn btn-success btn-icon">
                        <i class="fa fa-eye" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'MasterProduct/M_Product/CreateProductData/' . $person->id . '">
                    <button title="Edit" class="btn btn-primary btn-icon">
                        <i class="fa fa-edit" style="color:white"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'MasterProduct/M_Product_Act/DeleteProductData/' . $person->id . '">
                    <button title="Hidden Post" class="btn btn-danger btn-icon">
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
