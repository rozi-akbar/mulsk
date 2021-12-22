<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class M_Product_Act extends CI_Controller
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

    public function CreateMasterProduct($action = "", $id = "")
    {
        $UTC = new UTC;
        $this->input->post('price');
        $this->input->post('namaProduct');
        $uuid = date('YmdHis');
        if ($action == "Update") {
            $data = array(
                'nama_product'  => $this->input->post('namaProduct'),
                'price'         => $this->input->post('price'),
                'update_at'    => $UTC->DateTimeStamp(),
                'update_by'    => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('m_product', 'id', $id, $data);
            redirect(site_url('MasterProduct/M_Product/T_CreateProduct'));
        } elseif ($action == "Insert") {
            $data = array(
                'product_id'    => $uuid,
                'nama_product'  => $this->input->post('namaProduct'),
                'price'         => $this->input->post('price'),
                'created_at'    => $UTC->DateTimeStamp(),
                'created_by'    => $this->session->userdata('username_mulsk')
            );
            $this->model->Insert('m_product', $data);
            redirect(site_url('MasterProduct/M_Product/T_CreateProduct'));
        } elseif ($action == "Delete") {
            $data = array(
                'is_delete'     => 1,
                'deleted_at'    => $UTC->DateTimeStamp(),
                'deleted_by'    => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('m_product', 'id', $id, $data);
            redirect(site_url('MasterProduct/M_Product/T_CreateProduct'));
        } else {
        }
    }

    function ProductData()
    {
        $UTC = new UTC;

        if (empty($this->input->post('publish'))) {
            $status_publish = 0;
        } else {
            $status_publish = 1;
        }

        $this->db->trans_start();

        $tb_m_product = array(
            'deskripsi'     => $this->input->post('deskripsi'),
            'benefits'      => $this->input->post('benefits'),
            'update_at'     => $UTC->DateTimeStamp(),
            'update_by'     => $this->session->userdata('username_mulsk'),
            'publish'       => $status_publish,
            'published_at'  => $UTC->DateTimeStamp(),
            'published_by'  => $this->session->userdata('username_mulsk')
        );

        $this->model->Update('m_product', 'product_id', $this->input->post('productId'), $tb_m_product);

        $t_gallery = $_FILES['p_gallery']['name'];
        $this->I_Gallery($t_gallery, $this->input->post('productId'), $this->input->post('productName'));

        $t_productIcon = $_FILES['p_icon']['name'];
        $t_productIconDesc = $this->input->post('pi_desc');
        $this->I_ProductIcon($t_productIcon, $t_productIconDesc, $this->input->post('productId'), $this->input->post('productName'));

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_ProductData'));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_ProductData'));
        }
    }

    function DeleteProductData($id = "")
    {
        $UTC = new UTC;
        $this->db->trans_start();

        $data = array(
            'is_delete'     => 1,
            'deleted_at'    => $UTC->DateTimeStamp(),
            'deleted_by'    => $this->session->userdata('username_mulsk')
        );
        $this->model->Update('m_product', 'id', $id, $data);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/ProductData'));
        } else {
            redirect(site_url('MasterProduct/M_Product/ProductData'));
        }
    }

    function EditGallery($id_master = "", $id_gallery = "", $productName = "")
    {
        $this->db->trans_start();

        $photo = $_FILES['p_gallery']['name'];
        $getData = $this->db->query("SELECT * FROM product_gallery WHERE id = '" . $id_gallery . "' ")->row_array();
        $key = explode('_', $getData['gallery_id']);
        $this->U_Gallery($photo, $id_gallery, str_replace('%20', ' ', $productName), $key[1], $getData['url_image']);

        $this->db->trans_complete();
        if ($this->db->trans_status === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        }
    }

    function I_Gallery($photo, $noId, $productName)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');
        $to_folder = "";
        $this->db->trans_start();

        if (empty($photo)) {
        } else {
            foreach ($photo as $key_gallery => $value_gallery) {
                $t_rename = $uuid . "_$productName-$key_gallery";
                $image_gallery = $_FILES['p_gallery']['name'][$key_gallery];
                $x_image = explode('.', $image_gallery);
                $ekstensi = strtolower(end($x_image));
                $size    = $_FILES['p_gallery']['size'][$key_gallery];

                $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
                $file_temp = $_FILES['p_gallery']['tmp_name'][$key_gallery]; //data temp yang di upload
                $to_folder    = "assets/images/product/$rename"; //folder tujuan                

                $getJml = $this->db->query("SELECT m_product_id FROM product_gallery WHERE m_product_id = '" . $noId . "' ")->num_rows();

                if (!empty($image_gallery)) {
                    if ($getJml < 10) {
                        $gallery_id = $uuid . "_" . $key_gallery;

                        if ($size < 1000000 && !empty($ekstensi)) {
                            $data = array(
                                'm_product_id'  => $noId,
                                'gallery_id'    => $gallery_id,
                                'url_image'     => $to_folder,
                                'created_at'    => $UTC->DateTimeStamp(),
                                'created_by'    => $this->session->userdata('username_mulsk')
                            );
                            // print_r($data);
                            $this->model->Insert('product_gallery', $data);
                            move_uploaded_file($file_temp, "$to_folder");
                        } else {
                        }
                    } else {
                    }
                } else {
                }
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            if (empty($to_folder) || $to_folder == "") {
            } else {
                unlink($to_folder);
            }
        } else {
            return "success";
        }
    }

    function U_Gallery($photo, $id, $productName, $key_gallery, $oldUrl)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');
        $to_folder = "";
        $this->db->trans_start();

        if (empty($photo)) {
        } else {
            $t_rename = $uuid . "_$productName-$key_gallery";
            $image_gallery = $_FILES['p_gallery']['name'];
            $x_image = explode('.', $image_gallery);
            $ekstensi = strtolower(end($x_image));
            $size    = $_FILES['p_gallery']['size'];

            $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['p_gallery']['tmp_name']; //data temp yang di upload
            $to_folder    = "assets/images/product/$rename"; //folder tujuan                

            if (!empty($image_gallery)) {
                if ($size < 1000000 && !empty($ekstensi)) {
                    $data = array(
                        'url_image'     => $to_folder,
                        'update_at'    => $UTC->DateTimeStamp(),
                        'update_by'    => $this->session->userdata('username_mulsk')
                    );
                    // print_r($data);
                    $this->model->Update('product_gallery', 'id', $id, $data);
                    move_uploaded_file($file_temp, "$to_folder");
                } else {
                }
            } else {
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            if (empty($to_folder) || $to_folder == "") {
            } else {
                unlink($to_folder);
            }
        } else {
            unlink($oldUrl);
        }
    }

    function I_ProductIcon($icon, $desc, $noId, $iconName)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');
        $to_folder = "";
        $this->db->trans_start();

        if (empty($icon)) {
        } else {
            //===================== UPLOAD ICON ========================
            for ($count = 0; $count < count($_FILES['p_icon']['name']); $count++) {

                $t_rename = $uuid . "_$iconName-$count";
                $image_icon = $_FILES['p_icon']['name'][$count];
                $x_image = explode('.', $image_icon);
                $ekstensi = strtolower(end($x_image));
                $size    = $_FILES['p_icon']['size'][$count];

                $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
                $file_temp = $_FILES['p_icon']['tmp_name'][$count]; //data temp yang di upload
                $to_folder    = "assets/images/product-icon/$rename"; //folder tujuan                

                $getJml = $this->db->query("SELECT m_product_id FROM product_icon WHERE m_product_id = '" . $noId . "' ")->num_rows();

                if (!empty($image_icon)) {
                    if ($getJml < 10) {
                        $icon_id = $uuid . "_" . $count;

                        if ($size < 1000000 && !empty($ekstensi)) {
                            $data = array(
                                'm_product_id'              => $noId,
                                'product_icon_id'           => $icon_id,
                                'url_product_icon'          => $to_folder,
                                'description_product_icon'  => $this->input->post('pi_desc')[$count],
                                'created_at'                => $UTC->DateTimeStamp(),
                                'created_by'                => $this->session->userdata('username_mulsk')
                            );
                            $this->model->Insert('product_icon', $data);
                            move_uploaded_file($file_temp, "$to_folder");
                        } else {
                        }
                    } else {
                    }
                } else {
                }
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            if (empty($to_folder) || $to_folder == "") {
            } else {
                unlink($to_folder);
            }
        } else {
            return "success";
        }
    }

    function EditProductIcon($id_master = "", $id_icon = "", $productName = "")
    {
        $this->db->trans_start();

        $icon = $_FILES['p_icon']['name'];
        $desc = $this->input->post('pi_desc');
        $getData = $this->db->query("SELECT * FROM product_icon WHERE id = '" . $id_icon . "' ")->row_array();
        $key = explode('_', $getData['product_icon_id']);
        $this->U_ProductIcon($icon, $id_icon, str_replace('%20', ' ', $productName), $key[1], $getData['url_product_icon'], $desc);

        $this->db->trans_complete();
        if ($this->db->trans_status === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        }
    }

    function U_ProductIcon($icon, $id, $productName, $key_icon, $oldUrl, $desc)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');
        $to_folder = "";
        $this->db->trans_start();

        if (empty($icon)) {
        } else {
            $t_rename = $uuid . "_$productName-$key_icon";
            $image_icon = $_FILES['p_icon']['name'];
            $x_image = explode('.', $image_icon);
            $ekstensi = strtolower(end($x_image));
            $size    = $_FILES['p_icon']['size'];

            $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['p_icon']['tmp_name']; //data temp yang di upload
            $to_folder    = "assets/images/product-icon/$rename"; //folder tujuan                

            if (!empty($image_icon)) {
                if ($size < 1000000 && !empty($ekstensi)) {
                    $data = array(
                        'url_product_icon'          => $to_folder,
                        'description_product_icon'  => $desc,
                        'update_at'                 => $UTC->DateTimeStamp(),
                        'update_by'                 => $this->session->userdata('username_mulsk')
                    );
                    // print_r($data);
                    $this->model->Update('product_icon', 'id', $id, $data);
                    move_uploaded_file($file_temp, "$to_folder");
                } else {
                }
            } else {
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            if (empty($to_folder) || $to_folder == "") {
            } else {
                unlink($to_folder);
            }
        } else {
            unlink($oldUrl);
        }
    }
}
