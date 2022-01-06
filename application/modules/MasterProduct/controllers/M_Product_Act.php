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

        $this->db->trans_start();

        if ($action == "Update") {

            $t_rename = date('YmdHis') . "_" . str_replace(' ', '', $this->input->post('namaProduct'));
            $image_gallery = $_FILES['image']['name'];
            $x_image = explode('.', $image_gallery);
            $ekstensi = strtolower(end($x_image));
            $size    = $_FILES['image']['size'];

            $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['image']['tmp_name']; //data temp yang di upload
            $to_folder    = "assets/images/product/$rename"; //folder tujuan

            if (empty($image_gallery)) {
                $data = array(
                    'nama_product'  => $this->input->post('namaProduct'),
                    'price'         => $this->input->post('price'),
                    'update_at'    => $UTC->DateTimeStamp(),
                    'update_by'    => $this->session->userdata('username_mulsk')
                );
                $this->model->Update('m_product', 'id', $id, $data);
            } else {
                if ($size < 1000000 && !empty($ekstensi)) {
                    $data = array(
                        'nama_product'  => $this->input->post('namaProduct'),
                        'price'         => $this->input->post('price'),
                        'image'         => $to_folder,
                        'update_at'    => $UTC->DateTimeStamp(),
                        'update_by'    => $this->session->userdata('username_mulsk')
                    );
                    $this->model->Update('m_product', 'id', $id, $data);
                    unlink($this->input->post('oldUrl'));
                    move_uploaded_file($file_temp, "$to_folder");
                } else {
                }
            }
        } elseif ($action == "Insert") {

            $t_rename = date('YmdHis') . "_" . str_replace(' ', '', $this->input->post('namaProduct'));
            $image_gallery = $_FILES['image']['name'];
            $x_image = explode('.', $image_gallery);
            $ekstensi = strtolower(end($x_image));
            $size    = $_FILES['image']['size'];

            $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['image']['tmp_name']; //data temp yang di upload
            $to_folder    = "assets/images/product/$rename"; //folder tujuan                

            if ($size < 1000000 && !empty($ekstensi)) {
                $data = array(
                    'product_id'    => $uuid,
                    'nama_product'  => $this->input->post('namaProduct'),
                    'price'         => $this->input->post('price'),
                    'image'         => $to_folder,
                    'created_at'    => $UTC->DateTimeStamp(),
                    'created_by'    => $this->session->userdata('username_mulsk')
                );
                $this->model->Insert('m_product', $data);
                move_uploaded_file($file_temp, "$to_folder");
            } else {
            }
        } elseif ($action == "Delete") {
            $data = array(
                'is_delete'     => 1,
                'deleted_at'    => $UTC->DateTimeStamp(),
                'deleted_by'    => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('m_product', 'id', $id, $data);
        } else {
        }

        $this->db->trans_complete();
        if ($this->db->trans_status === FALSE) {
            $this->db->rollback();
            redirect(site_url('MasterProduct/M_Product/T_CreateProduct'));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_CreateProduct'));
        }
    }

    function U_ThumbnailProduct($id = "", $oldUrl_Thumbnail = "")
    {
        $this->db->trans_start();

        $t_rename = date('YmdHis') . "_" . str_replace(' ', '', $this->input->post('productName'));
        $image_thumbnail = $_FILES['imageThumbnail']['name'];
        $x_image = explode('.', $image_thumbnail);
        $ekstensi = strtolower(end($x_image));
        $size    = $_FILES['imageThumbnail']['size'];

        $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
        $file_temp = $_FILES['imageThumbnail']['tmp_name']; //data temp yang di upload
        $to_folder    = "assets/images/product/$rename"; //folder tujuan                

        if ($size < 1000000 && !empty($ekstensi)) {
            if ($ekstensi == "png" || $ekstensi == "jpg" || $ekstensi == "jpeg") {
                $data = array(
                    'image'         => $to_folder
                );
                $this->model->Update('m_product', 'product_id', $id, $data);
                move_uploaded_file($file_temp, "$to_folder");
            } else {
            }
        } else {
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            unlink($to_folder);
        } else {
            unlink($oldUrl_Thumbnail);
        }
    }

    function U_BenefitsImage($id = "", $oldUrl_BenefitsImage = "")
    {
        $this->db->trans_start();

        $t_rename = date('YmdHis') . "_Benefits_" . str_replace(' ', '', $this->input->post('productName'));
        $image_benefits = $_FILES['imageBenefits']['name'];
        $x_image = explode('.', $image_benefits);
        $ekstensi = strtolower(end($x_image));
        $size    = $_FILES['imageBenefits']['size'];

        $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
        $file_temp = $_FILES['imageBenefits']['tmp_name']; //data temp yang di upload
        $to_folder    = "assets/images/product/$rename"; //folder tujuan                

        if ($size < 1000000 && !empty($ekstensi)) {
            if ($ekstensi == "png") {
                $data = array(
                    'benefits_image'         => $to_folder
                );
                $this->model->Update('m_product', 'product_id', $id, $data);
                move_uploaded_file($file_temp, "$to_folder");
            } else {
            }
        } else {
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            unlink($to_folder);
        } else {
            unlink($oldUrl_BenefitsImage);
        }
    }

    function ProductDataInsert()
    {
        $UTC = new UTC;
        $this->input->post('price');
        $this->input->post('namaProduct');
        $uuid = date('YmdHis');

        if (empty($this->input->post('publish'))) {
            $status_publish = 0;
        } else {
            $status_publish = 1;
        }

        $this->db->trans_start();

        //===================================IMAGE THUMBNAIL===================================================
        $t_rename = date('YmdHis') . "_Thumbnail_" . str_replace(' ', '', $this->input->post('namaProduct'));
        $image_gallery = $_FILES['image']['name'];
        $x_image = explode('.', $image_gallery);
        $ekstensi = strtolower(end($x_image));
        $size    = $_FILES['image']['size'];

        $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
        $file_temp = $_FILES['image']['tmp_name']; //data temp yang di upload
        $to_folder    = "assets/images/product/$rename"; //folder tujuan 
        //===================================END IMAGE THUMBNAIL===================================================

        //===================================IMAGE BENEFITS===================================================
        $t_rename_benefits = date('YmdHis') . "_Benefits_" . str_replace(' ', '', $this->input->post('namaProduct'));
        $image_gallery_benefits = $_FILES['imageBenefits']['name'];
        $x_image_benefits = explode('.', $image_gallery_benefits);
        $ekstensi_benefits = strtolower(end($x_image_benefits));
        $size_benefits    = $_FILES['imageBenefits']['size'];

        $rename_benefits = $t_rename_benefits . "." . $ekstensi_benefits; //ganti nama file sesuai ekstensi
        $file_temp_benefits = $_FILES['imageBenefits']['tmp_name']; //data temp yang di upload
        $to_folder_benefits    = "assets/images/product/$rename_benefits"; //folder tujuan
        //===================================END IMAGE BENEFITS===================================================

        if ($size < 500000 && $size_benefits < 500000) {
            if ($status_publish == 1) {
                $data = array(
                    'product_id'        => $uuid,
                    'nama_product'      => $this->input->post('namaProduct'),
                    'price'             => $this->input->post('price'),
                    'image'             => $to_folder,
                    'benefits_image'    => $to_folder_benefits,
                    'deskripsi'         => $this->input->post('deskripsi'),
                    'benefits'          => $this->input->post('benefits'),
                    'publish'           => $status_publish,
                    'published_at'      => $UTC->DateTimeStamp(),
                    'published_by'      => $this->session->userdata('username_mulsk'),
                    'created_at'        => $UTC->DateTimeStamp(),
                    'created_by'        => $this->session->userdata('username_mulsk')
                );
            } else {
                $data = array(
                    'product_id'        => $uuid,
                    'nama_product'      => $this->input->post('namaProduct'),
                    'price'             => $this->input->post('price'),
                    'image'             => $to_folder,
                    'benefits_image'    => $to_folder_benefits,
                    'deskripsi'         => $this->input->post('deskripsi'),
                    'benefits'          => $this->input->post('benefits'),
                    'publish'           => $status_publish,
                    'created_at'        => $UTC->DateTimeStamp(),
                    'created_by'        => $this->session->userdata('username_mulsk')
                );
            }

            $getId = $this->db->query("SELECT * FROM m_product WHERE product_id = '" . $uuid . "' ");

            if ($getId->num_rows() > 0) {
            } else {
                $this->model->Insert('m_product', $data);
                move_uploaded_file($file_temp, "$to_folder");
                move_uploaded_file($file_temp_benefits, "$to_folder_benefits");

                $t_gallery = $_FILES['p_gallery']['name'];
                $this->I_Gallery($t_gallery, $uuid, $this->input->post('namaProduct'));

                $t_galleryWOC = $_FILES['p_galleryWOC']['name'];
                $this->I_GalleryWithoutColor($t_galleryWOC, $uuid, $this->input->post('namaProduct'));

                $t_productIcon = $_FILES['p_icon']['name'];
                $t_productIconDesc = $this->input->post('pi_desc');
                $this->I_ProductIcon($t_productIcon, $t_productIconDesc, $uuid, $this->input->post('namaProduct'));
            }

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                unlink($to_folder);
                unlink($to_folder_benefits);
                redirect(site_url('MasterProduct/M_Product/T_ProductData'));
            } else {
                redirect(site_url('MasterProduct/M_Product/T_ProductData'));
            }
        } else {
        }
    }

    function ProductData()
    {
        $UTC = new UTC;
        $oldUrl_Thumbnail = $this->input->post('oldUrl_thumbnail');
        $oldUrl_BenefitsImage = $this->input->post('oldUrl_benefits');

        if (empty($this->input->post('publish'))) {
            $status_publish = 0;
        } else {
            $status_publish = 1;
        }

        $this->db->trans_start();

        if ($status_publish == 1) {
            $tb_m_product = array(
                'nama_product'  => $this->input->post('productName'),
                'price'         => $this->input->post('price'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'benefits'      => $this->input->post('benefits'),
                'update_at'     => $UTC->DateTimeStamp(),
                'update_by'     => $this->session->userdata('username_mulsk'),
                'publish'       => $status_publish,
                'published_at'  => $UTC->DateTimeStamp(),
                'published_by'  => $this->session->userdata('username_mulsk')
            );
        } else {
            $tb_m_product = array(
                'nama_product'  => $this->input->post('productName'),
                'price'         => $this->input->post('price'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'benefits'      => $this->input->post('benefits'),
                'update_at'     => $UTC->DateTimeStamp(),
                'update_by'     => $this->session->userdata('username_mulsk'),
                'publish'       => $status_publish,
                'hidden_at'     => $UTC->DateTimeStamp(),
                'hidden_by'     => $this->session->userdata('username_mulsk')
            );
        }

        if (empty($_FILES['imageThumbnail']['name'])) {
        } else {
            $this->U_ThumbnailProduct($this->input->post('productId'), $oldUrl_Thumbnail);
        }

        if (empty($_FILES['imageBenefits']['name'])) {
        } else {
            $this->U_BenefitsImage($this->input->post('productId'), $oldUrl_BenefitsImage);
        }

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
        $UTC = new UTC;
        $this->db->trans_start();

        if (empty($_FILES['p_gallery']['name']) || $_FILES['p_gallery']['name'] == "") {
            $data = array(
                // 'color'         => $this->input->post('color_hex'),
                // 'color_name'    => $this->input->post('colorName'),
                'id_color'      => $this->input->post('color_hex'),
                'update_at'     => $UTC->DateTimeStamp(),
                'update_by'     => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('product_gallery', 'id', $id_gallery, $data);
        } else {
            $photo = $_FILES['p_gallery']['name'];
            $getData = $this->db->query("SELECT * FROM product_gallery WHERE id = '" . $id_gallery . "' ")->row_array();
            $key = explode('_', $getData['gallery_id']);
            $this->U_Gallery($photo, $id_gallery, str_replace('%20', '_', $productName), $key[1], $getData['url_image']);
        }

        $this->db->trans_complete();
        if ($this->db->trans_status === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        }
    }

    function EditGalleryWithoutColor($id_master = "", $id_gallery = "", $productName = "")
    {
        $this->db->trans_start();

        if (empty($_FILES['p_galleryWOC']['name']) || $_FILES['p_galleryWOC']['name'] == "") {
        } else {
            $photo = $_FILES['p_galleryWOC']['name'];
            $getData = $this->db->query("SELECT * FROM product_gallery WHERE id = '" . $id_gallery . "' ")->row_array();
            $key = explode('_', $getData['gallery_id']);
            $this->U_GalleryWithoutColor($photo, $id_gallery, str_replace('%20', '_', $productName), $key[1], $getData['url_image']);
        }

        $this->db->trans_complete();
        if ($this->db->trans_status === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        }
    }

    function EditColorSelector($id_master = "", $id_colorSelector = "", $productName = "")
    {
        $UTC = new UTC;
        $x_id = explode('-', $this->input->post('colorSelector'));
        $urutan = $x_id[1];
        $id_product_image = $x_id[0];

        $this->db->trans_start();

        $data = array(
            'id_product_image'          => $id_product_image,
            'urutan'                    => $urutan,
            'color'                     => $this->input->post('color_hex'),
            'color_name'                => $this->input->post('colorName'),
            'update_at'                => $UTC->DateTimeStamp(),
            'update_by'                => $this->session->userdata('username_mulsk')
        );
        $this->model->Update('product_color_image_selector', 'id', $id_colorSelector, $data);

        $this->db->trans_complete();
        if ($this->db->trans_status === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_EditColorSelector/' . $id_master));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_EditColorSelector/' . $id_master));
        }
    }

    function DeleteGallery($id_master = "", $id = "")
    {
        $UTC = new UTC;

        $this->db->trans_start();
        $data = array(
            'is_delete'     => 1,
            'deleted_at'    => $UTC->DateTimeStamp(),
            'deleted_by'    => $this->session->userdata('username_mulsk')
        );

        $this->model->Update('product_gallery', 'id', $id, $data);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        }
    }

    public function DeleteProductIcon($id_master = "", $id = "")
    {
        $UTC = new UTC;

        $this->db->trans_start();
        $data = array(
            'is_delete'     => 1,
            'deleted_at'    => $UTC->DateTimeStamp(),
            'deleted_by'    => $this->session->userdata('username_mulsk')
        );

        $this->model->Update('product_icon', 'id', $id, $data);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        } else {
            redirect(site_url('MasterProduct/M_Product/T_CreateProductData/' . $id_master));
        }
    }

    public function DeleteColorSelector($id_master = "", $id = "")
    {
        $UTC = new UTC;

        $this->db->trans_start();
        $data = array(
            'is_delete'     => 1,
            'deleted_at'    => $UTC->DateTimeStamp(),
            'deleted_by'    => $this->session->userdata('username_mulsk')
        );

        $this->model->Update('product_color_image_selector', 'id', $id, $data);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
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
            for ($count = 0; $count < count($_FILES['p_gallery']['name']); $count++) {
                $t_rename = $uuid . "_" . str_replace(' ', '_', $productName) . "-$count-color";
                $image_gallery = $_FILES['p_gallery']['name'][$count];
                $x_image = explode('.', $image_gallery);
                $ekstensi = strtolower(end($x_image));
                $size    = $_FILES['p_gallery']['size'][$count];

                $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
                $file_temp = $_FILES['p_gallery']['tmp_name'][$count]; //data temp yang di upload
                $to_folder    = "assets/images/product/$rename"; //folder tujuan                

                $getJml = $this->db->query("SELECT m_product_id FROM product_gallery WHERE m_product_id = '" . $noId . "' AND is_delete = 0")->num_rows();

                if (!empty($image_gallery)) {
                    if ($getJml < 10) {
                        $gallery_id = $uuid . "_" . $count."_color";

                        if ($size < 500000 && !empty($ekstensi)) {
                            if ($ekstensi == "png" || $ekstensi == "jpg" || $ekstensi == "jpeg") {
                                $data = array(
                                    'm_product_id'  => $noId,
                                    'gallery_id'    => $gallery_id,
                                    'url_image'     => $to_folder,
                                    'id_color'      => $this->input->post('color_hex')[$count],
                                    // 'color'         => $this->input->post('color_hex')[$count],
                                    // 'color_name'    => $this->input->post('colorName')[$count],
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

    function I_GalleryWithoutColor($photo, $noId, $productName)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');
        $to_folder = "";
        $this->db->trans_start();

        if (empty($photo)) {
        } else {
            for ($count = 0; $count < count($_FILES['p_galleryWOC']['name']); $count++) {
                $t_rename = $uuid . "_" . str_replace(' ', '_', $productName) . "-$count";
                $image_gallery = $_FILES['p_galleryWOC']['name'][$count];
                $x_image = explode('.', $image_gallery);
                $ekstensi = strtolower(end($x_image));
                $size    = $_FILES['p_galleryWOC']['size'][$count];

                $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
                $file_temp = $_FILES['p_galleryWOC']['tmp_name'][$count]; //data temp yang di upload
                $to_folder    = "assets/images/product/$rename"; //folder tujuan                

                $getJml = $this->db->query("SELECT m_product_id FROM product_gallery WHERE m_product_id = '" . $noId . "' AND is_delete = 0")->num_rows();

                if (!empty($image_gallery)) {
                    if ($getJml < 10) {
                        $gallery_id = $uuid . "_" . $count;

                        if ($size < 500000 && !empty($ekstensi)) {
                            if ($ekstensi == "png" || $ekstensi == "jpg" || $ekstensi == "jpeg") {
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

    function U_GalleryWithoutColor($photo, $id, $productName, $key_gallery, $oldUrl)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');
        $to_folder = "";
        $this->db->trans_start();

        if (empty($photo)) {
            echo "nothing";
        } else {
            $t_rename = $uuid . "_" . str_replace(' ', '_', $productName) . "-$key_gallery";
            $image_gallery = $_FILES['p_galleryWOC']['name'];
            $x_image = explode('.', $image_gallery);
            $ekstensi = strtolower(end($x_image));
            $size    = $_FILES['p_galleryWOC']['size'];

            $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['p_galleryWOC']['tmp_name']; //data temp yang di upload
            $to_folder    = "assets/images/product/$rename"; //folder tujuan                

            if (!empty($image_gallery)) {
                if ($size < 500000 && !empty($ekstensi)) {
                    if ($ekstensi == "png" || $ekstensi == "jpg" || $ekstensi == "jpeg") {
                        $data = array(
                            'url_image'     => $to_folder,
                            'update_at'     => $UTC->DateTimeStamp(),
                            'update_by'     => $this->session->userdata('username_mulsk')
                        );
                        // print_r($data);
                        $this->model->Update('product_gallery', 'id', $id, $data);
                        move_uploaded_file($file_temp, "$to_folder");
                    } else {
                    }
                } else {
                    // echo "size gedhe";
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

    function U_Gallery($photo, $id, $productName, $key_gallery, $oldUrl)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');
        $to_folder = "";
        $this->db->trans_start();

        if (empty($photo)) {
            echo "nothing";
        } else {
            $t_rename = $uuid . "_" . str_replace(' ', '_', $productName) . "-$key_gallery-color";
            $image_gallery = $_FILES['p_gallery']['name'];
            $x_image = explode('.', $image_gallery);
            $ekstensi = strtolower(end($x_image));
            $size    = $_FILES['p_gallery']['size'];

            $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['p_gallery']['tmp_name']; //data temp yang di upload
            $to_folder    = "assets/images/product/$rename"; //folder tujuan                

            if (!empty($image_gallery)) {
                if ($size < 500000 && !empty($ekstensi)) {
                    if ($ekstensi == "png" || $ekstensi == "jpg" || $ekstensi == "jpeg") {
                        $data = array(
                            'url_image'     => $to_folder,
                            'id_color'      => $this->input->post('color_hex'),
                            // 'color'         => $this->input->post('color_hex'),
                            // 'color_name'    => $this->input->post('colorName'),
                            'update_at'     => $UTC->DateTimeStamp(),
                            'update_by'     => $this->session->userdata('username_mulsk')
                        );
                        // print_r($data);
                        $this->model->Update('product_gallery', 'id', $id, $data);
                        move_uploaded_file($file_temp, "$to_folder");
                    } else {
                    }
                } else {
                    // echo "size gedhe";
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

                $t_rename = $uuid . "_" . str_replace(' ', '_', $iconName) . "-$count";
                $image_icon = $_FILES['p_icon']['name'][$count];
                $x_image = explode('.', $image_icon);
                $ekstensi = strtolower(end($x_image));
                $size    = $_FILES['p_icon']['size'][$count];

                $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
                $file_temp = $_FILES['p_icon']['tmp_name'][$count]; //data temp yang di upload
                $to_folder    = "assets/images/product-icon/$rename"; //folder tujuan                

                $getJml = $this->db->query("SELECT m_product_id FROM product_icon WHERE m_product_id = '" . $noId . "' AND is_delete = 0")->num_rows();

                if (!empty($image_icon)) {
                    if ($getJml < 10) {
                        $icon_id = $uuid . "_" . $count;

                        if ($size < 100000 && !empty($ekstensi)) {
                            if ($ekstensi == "png" || $ekstensi == "svg") {
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
        $UTC = new UTC;
        $icon = $_FILES['p_icon']['name'];
        $desc = $this->input->post('pi_desc');

        $this->db->trans_start();

        if (empty($_FILES['p_icon']['name']) || $_FILES['p_icon']['name'] == "") {
            $data = array(
                'description_product_icon'  => $desc,
                'update_at'                 => $UTC->DateTimeStamp(),
                'update_by'                 => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('product_icon', 'id', $id_icon, $data);
        } else {
            $getData = $this->db->query("SELECT * FROM product_icon WHERE id = '" . $id_icon . "' ")->row_array();
            $key = explode('_', $getData['product_icon_id']);
            $this->U_ProductIcon($icon, $id_icon, str_replace('%20', ' ', $productName), $key[1], $getData['url_product_icon'], $desc);
        }

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
            $t_rename = $uuid . "_" . str_replace(' ', '_', $productName) . "-$key_icon";
            $image_icon = $_FILES['p_icon']['name'];
            $x_image = explode('.', $image_icon);
            $ekstensi = strtolower(end($x_image));
            $size    = $_FILES['p_icon']['size'];

            $rename = $t_rename . "." . $ekstensi; //ganti nama file sesuai ekstensi
            $file_temp = $_FILES['p_icon']['tmp_name']; //data temp yang di upload
            $to_folder    = "assets/images/product-icon/$rename"; //folder tujuan                

            if (!empty($image_icon)) {
                if ($size < 100000 && !empty($ekstensi)) {
                    if ($ekstensi == "png" || $ekstensi == "svg") {
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

    function I_ColorSelector($colorSelector, $noId)
    {
        $UTC = new UTC;
        $uuid = date('YmdHis');

        $this->db->trans_start();

        if (empty($colorSelector)) {
        } else {
            for ($count = 0; $count < count($this->input->post('colorSelector')); $count++) {
                $x_id = explode('-', $this->input->post('colorSelector')[$count]);
                $urutan = $x_id[1];
                $id_product_image = $x_id[0];

                $icon_id = $uuid . "_" . $count;

                $data = array(
                    'm_product_id'              => $noId,
                    'id_product_color'          => $icon_id,
                    'id_product_image'          => $id_product_image,
                    'urutan'                    => $urutan,
                    'color'                     => $this->input->post('color_hex')[$count],
                    'color_name'                => $this->input->post('colorName')[$count],
                    'created_at'                => $UTC->DateTimeStamp(),
                    'created_by'                => $this->session->userdata('username_mulsk')
                );
                $this->model->Insert('product_color_image_selector', $data);
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            return "success";
        }
    }

    function CreateShadeColor($aksi = "", $id = "")
    {
        $UTC = new UTC;
        if ($aksi == "Insert") {
            $this->db->trans_start();

            for ($count = 0; $count < count($this->input->post('color_hex')); $count++) {
                $data = array(
                    'color'                     => $this->input->post('color_hex')[$count],
                    'color_name'                => $this->input->post('colorName')[$count],
                    'created_at'                => $UTC->DateTimeStamp(),
                    'created_by'                => $this->session->userdata('username_mulsk')
                );
                $this->model->Insert('m_color', $data);
            }

            $this->db->trans_complete();
            if ($this->db->trans_status === FALSE) {
                $this->db->trans_rollback();
                redirect(site_url('MasterProduct/M_Product/T_M_ShadeColor'));
            } else {
                redirect(site_url('MasterProduct/M_Product/T_M_ShadeColor'));
            }
        } elseif ($aksi == "Update") {
            $this->db->trans_start();
            $data = array(
                'color'                     => $this->input->post('u_color_hex'),
                'color_name'                => $this->input->post('u_colorName'),
                'update_at'                => $UTC->DateTimeStamp(),
                'update_by'                => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('m_color', 'id', $id, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status === FALSE) {
                $this->db->trans_rollback();
                redirect(site_url('MasterProduct/M_Product/T_M_ShadeColor'));
            } else {
                redirect(site_url('MasterProduct/M_Product/T_M_ShadeColor'));
            }
        } elseif ($aksi == "Delete") {
            $this->db->trans_start();
            $data = array(
                'is_delete'                => 1,
                'deleted_at'               => $UTC->DateTimeStamp(),
                'deleted_by'               => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('m_color', 'id', $id, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status === FALSE) {
                $this->db->trans_rollback();
                redirect(site_url('MasterProduct/M_Product/T_M_ShadeColor'));
            } else {
                redirect(site_url('MasterProduct/M_Product/T_M_ShadeColor'));
            }
        } else {
            redirect(site_url('MasterProduct/M_Product/T_M_ShadeColor'));
        }
    }
}
