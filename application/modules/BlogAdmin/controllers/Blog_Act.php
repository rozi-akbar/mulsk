<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/' . 'UTC.php');
require_once(APPPATH . 'core/' . 'Hash.php');

class Blog_Act extends CI_Controller
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

    function save($id = "")
    {
        $title = $this->input->post('title', TRUE);
        $contents = $_POST['contents'];
        $UTC = new UTC;
        // $data = array(
        //     'title'     => $title,
        //     'content'   => $contents
        // );

        $data = array(
            'id_blog'   => $id,
            'title'     => $title,
            'content'   => $contents,
            'create_at' => $UTC->DateTimeStamp(),
            'create_by' => $this->session->userdata('username_mulsk'),
            'draft'     => 1
        );

        $banner = $_FILES['banner']['name'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $this->db->trans_start();

        // $this->model->Update('blog', 'id_blog', $id, $data);
        $getId = $this->db->query("SELECT * FROM blog WHERE id_blog = '" . $id . "' ");
        if ($getId->num_rows() > 0) {
        } else {
            $this->model->Insert('blog', $data);

            $this->I_upload_banner_blog($banner, $id);
            $this->I_upload_thumbnail_blog($thumbnail, $id);
            $this->I_product_include($id);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            redirect(site_url('BlogAdmin/Blog/T_DataBlog'));
        }
    }

    function I_product_include($id_blog)
    {
        $this->db->trans_start();

        if (empty($this->input->post('pi'))) {
        } else {
            $getDataBefore = $this->db->query("SELECT * FROM blog_product_selected WHERE m_blog_id = '" . $id_blog . "' ");
            if ($getDataBefore->num_rows() > 0) {
                $this->model->Delete('blog_product_selected', 'm_blog_id', $id_blog);

                for ($count = 0; $count < count($this->input->post('pi')); $count++) {
                    $data = array(
                        'm_product_id'  => $this->input->post('pi')[$count],
                        'm_blog_id'     => $id_blog
                    );
                    $this->model->Insert('blog_product_selected', $data);
                }
            } else {
                for ($count = 0; $count < count($this->input->post('pi')); $count++) {
                    $data = array(
                        'm_product_id'  => $this->input->post('pi')[$count],
                        'm_blog_id'     => $id_blog
                    );
                    $this->model->Insert('blog_product_selected', $data);
                }
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
        }
    }

    function UpdateBlog($id = "")
    {
        // var_dump($_POST['contents']);
        // die;
        $UTC = new UTC;
        $title = $this->input->post('title', TRUE);
        $contents = $_POST['contents'];
        $data = array(
            'title'     => $title,
            'content'   => $contents,
            'update_at'   => $UTC->DateTimeStamp(),
            'update_by' => $this->session->userdata('username_mulsk')
        );

        $banner = $_FILES['banner']['name'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $this->db->trans_start();
        $this->model->Update('blog', 'id_blog', $id, $data);
        $this->U_upload_banner_blog($banner, $id, $this->input->post('old_url_banner', TRUE));
        $this->U_upload_thumbnail_blog($thumbnail, $id, $this->input->post('old_url_thumbnail', TRUE));
        $this->I_product_include($id);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            redirect(site_url('BlogAdmin/Blog/T_DataBlog'));
        }
    }

    function Posting($id = "")
    {
        $checkFirstPublish = $this->db->query("SELECT * FROM blog WHERE id = '" . $id . "' ")->row_array();
        if ($checkFirstPublish['first_posted_at'] == null || empty($checkFirstPublish['first_posted_at']) || $checkFirstPublish['first_posted_at'] == "") {
            $this->FirstPosting($id);
        } else {
            $this->LastPosting($id);
        }
        redirect(site_url('BlogAdmin/Blog/T_DataBlog'));
    }

    function FirstPosting($id = "")
    {
        $UTC = new UTC;
        $data = array(
            'draft'             => 0,
            'posted'            => 1,
            'first_posted_at'   => $UTC->DateTimeStamp(),
            'first_posted_by'   => $this->session->userdata('username_mulsk'),
            'posted_at'         => $UTC->DateTimeStamp(),
            'posted_by'         => $this->session->userdata('username_mulsk')
        );
        $this->model->Update('blog', 'id', $id, $data);
    }

    function LastPosting($id = "")
    {
        $UTC = new UTC;
        $data = array(
            'draft'       => 0,
            'posted'      => 1,
            'posted_at'   => $UTC->DateTimeStamp(),
            'posted_by'   => $this->session->userdata('username_mulsk')
        );
        $this->model->Update('blog', 'id', $id, $data);
    }

    function HiddenPost($id = "")
    {
        $UTC = new UTC;
        $data = array(
            'posted'     => 2,
            'hidden_at'   => $UTC->DateTimeStamp(),
            'hidden_by'   => $this->session->userdata('username_mulsk')
        );
        $this->model->Update('blog', 'id', $id, $data);

        redirect(site_url('BlogAdmin/Blog/T_DataBlog'));
    }

    function Delete($id = "")
    {
        $UTC = new UTC;
        $data = array(
            'is_deleted'   => 1,
            'deleted_at'   => $UTC->DateTimeStamp(),
            'deleted_by'   => $this->session->userdata('username_mulsk')
        );
        $this->model->Update('blog', 'id', $id, $data);

        redirect(site_url('BlogAdmin/Blog/T_DataBlog'));
    }

    function I_upload_banner_blog($banner, $noId)
    {
        if (empty($banner)) {
        } else {
            $date_change = date('YmdHis');
            $cNew_name = "bannerBlog_$date_change";
            $image = $_FILES['banner']['name'];
            $x_image = explode('.', $image);
            $ekstensi_image = strtolower(end($x_image));
            $size    = $_FILES['banner']['size'];

            if ($ekstensi_image == "jpg" || $ekstensi_image == "jpeg" || $ekstensi_image == "png") {
                if ($size < 2000000) {
                    $new_name = $cNew_name . "." . $ekstensi_image; //ganti nama file sesuai ekstensi
                    $file_temp = $_FILES['banner']['tmp_name']; //data temp yang di upload
                    $to_folder    = "assets/images/blog/banner/$new_name"; //folder tujuan

                    $data = array(
                        'banner_blog' => $to_folder
                    );

                    $this->db->trans_start();
                    $this->model->Update('blog', 'id_blog', $noId, $data);
                    move_uploaded_file($file_temp, "$to_folder");
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        unlink($to_folder);
                    } else {
                        $data_return_banner_blog = $to_folder;
                        return $data_return_banner_blog;
                    }
                } else {
                }
            } else {
            }
        }
    }

    function I_upload_thumbnail_blog($thumbnail, $noId)
    {
        if (empty($thumbnail)) {
        } else {
            $date_change = date('YmdHis');
            $cNew_name = "thumbnailBlog_$date_change";
            $image = $_FILES['thumbnail']['name'];
            $x_image = explode('.', $image);
            $ekstensi_image = strtolower(end($x_image));
            $size    = $_FILES['thumbnail']['size'];

            if ($ekstensi_image == "jpg" || $ekstensi_image == "jpeg" || $ekstensi_image == "png") {
                if ($size < 2000000) {
                    $new_name = $cNew_name . "." . $ekstensi_image; //ganti nama file sesuai ekstensi
                    $file_temp = $_FILES['thumbnail']['tmp_name']; //data temp yang di upload
                    $to_folder    = "assets/images/blog/thumbnail/$new_name"; //folder tujuan

                    $data = array(
                        'thumbnail_blog' => $to_folder
                    );

                    $this->db->trans_start();
                    $this->model->Update('blog', 'id_blog', $noId, $data);
                    move_uploaded_file($file_temp, "$to_folder");
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        unlink($to_folder);
                    } else {
                        $data_return_thumbnail = $to_folder;
                        return $data_return_thumbnail;
                    }
                } else {
                }
            } else {
            }
        }
    }

    function U_upload_banner_blog($banner, $noId, $old_url_banner)
    {
        if (empty($banner)) {
        } else {
            $date_change = date('YmdHis');
            $cNew_name = "bannerBlog_$date_change";
            $image = $_FILES['banner']['name'];
            $x_image = explode('.', $image);
            $ekstensi_image = strtolower(end($x_image));
            $size    = $_FILES['banner']['size'];

            if ($ekstensi_image == "jpg" || $ekstensi_image == "jpeg" || $ekstensi_image == "png") {
                if ($size < 2000000) {
                    $new_name = $cNew_name . "." . $ekstensi_image; //ganti nama file sesuai ekstensi
                    $file_temp = $_FILES['banner']['tmp_name']; //data temp yang di upload
                    $to_folder    = "assets/images/blog/banner/$new_name"; //folder tujuan

                    $data = array(
                        'banner_blog' => $to_folder
                    );

                    $this->db->trans_start();
                    $this->model->Update('blog', 'id_blog', $noId, $data);
                    move_uploaded_file($file_temp, "$to_folder");
                    unlink($old_url_banner);
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        unlink($to_folder);
                    } else {
                        $data_return_banner_blog = $to_folder;
                        return $data_return_banner_blog;
                    }
                } else {
                }
            } else {
            }
        }
    }

    function U_upload_thumbnail_blog($thumbnail, $noId, $old_url_thumb)
    {
        if (empty($thumbnail)) {
        } else {
            $date_change = date('YmdHis');
            $cNew_name = "thumbnailBlog_$date_change";
            $image = $_FILES['thumbnail']['name'];
            $x_image = explode('.', $image);
            $ekstensi_image = strtolower(end($x_image));
            $size    = $_FILES['thumbnail']['size'];

            if ($ekstensi_image == "jpg" || $ekstensi_image == "jpeg" || $ekstensi_image == "png") {
                if ($size < 2000000) {
                    $new_name = $cNew_name . "." . $ekstensi_image; //ganti nama file sesuai ekstensi
                    $file_temp = $_FILES['thumbnail']['tmp_name']; //data temp yang di upload
                    $to_folder    = "assets/images/blog/thumbnail/$new_name"; //folder tujuan

                    $data = array(
                        'thumbnail_blog' => $to_folder
                    );

                    $this->db->trans_start();
                    $this->model->Update('blog', 'id_blog', $noId, $data);
                    move_uploaded_file($file_temp, "$to_folder");
                    unlink($old_url_thumb);
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        unlink($to_folder);
                    } else {
                        $data_return_thumbnail = $to_folder;
                        return $data_return_thumbnail;
                    }
                } else {
                }
            } else {
            }
        }
    }

    function RestoreAll()
    {
        $UTC = new UTC;
        $getDataSoftDelete = $this->model->Code("SELECT * FROM blog WHERE is_deleted = 1 ORDER BY id DESC");
        foreach ($getDataSoftDelete as $rowData) {
            $data = array(
                'draft'         => 1,
                'posted'        => 0,
                'is_deleted'    => 0,
                'restore_at'    => $UTC->DateTimeStamp(),
                'restore_by'    => $this->session->userdata('username_mulsk')
            );
            $this->model->Update('blog', 'id', $rowData['id'], $data);
        }
        redirect(site_url('BlogAdmin/Blog/T_BlogTrash'));
    }

    function RestoreBlog($id = "")
    {
        $UTC = new UTC;
        $data = array(
            'draft'         => 1,
            'posted'        => 0,
            'is_deleted'    => 0,
            'restore_at'    => $UTC->DateTimeStamp(),
            'restore_by'    => $this->session->userdata('username_mulsk')
        );
        $this->model->Update('blog', 'id', $id, $data);
        redirect(site_url('BlogAdmin/Blog/T_BlogTrash'));
    }

    function DeletePermanent($id = "")
    {
        $this->model->Delete('blog', 'id', $id);
        redirect(site_url('BlogAdmin/Blog/T_BlogTrash'));
    }
}
