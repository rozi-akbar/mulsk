<?php

if ($action == "edit") {
    foreach ($data_blog as $vaBlog) {
        $id         = $vaBlog['id_blog'];
        $title      = $vaBlog['title'];
        $contents   = $vaBlog['content'];
        $banner      = $vaBlog['banner_blog'];
        $thumbnail      = $vaBlog['thumbnail_blog'];
    }
    $valueAction = "Save Change";
    $fAction = 'UpdateBlog/' . $id;
} else {
    $id         = "";
    $title      = "";
    $contents   = "";
    $banner     = "";
    $thumbnail  = "";
    $valueAction = "Save";
    $fAction = 'save/' . $blog_id;
}

?>

<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <?= $file ?>
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">

        <div class="row">
            <div class="col-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Blog Mulsk bgst
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="<?= site_url('BlogAdmin/Blog_Act/' . $fAction); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Banner Blog <span id="file_error_banner"></span></label>
                                        <input type="file" name="banner" id="banner" onchange="return ValidasiPhoto();" class="form-control" accept="image/x-png,image/jpeg">
                                        <input type="hidden" name="old_url_banner" value="<?= $banner ?>">
                                        <?php
                                        if ($action == "edit") {
                                            if (empty($banner)) {
                                            } else {
                                                echo '<img src="' . base_url() . '' . $banner .
                                                    '" style="margin-bottom:2%; margin-top:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
                                            }
                                        } else {
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div id="preview_banner"> </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Thumbnail <span id="file_error_thumbnail"></span></label>
                                        <input type="file" name="thumbnail" id="thumbnail" onchange="return ValidasiPhoto();" class="form-control" accept="image/x-png,image/jpeg">
                                        <input type="hidden" name="old_url_thumbnail" value="<?= $thumbnail ?>">
                                        <?php
                                        if ($action == "edit") {
                                            if (empty($thumbnail)) {
                                            } else {
                                                echo '<img src="' . base_url() . '' . $thumbnail .
                                                    '" style="margin-bottom:2%; margin-top:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
                                            }
                                        } else {
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div id="preview_thumbnail"> </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?= $title ?>" required>
                                        <input type="hidden" name="blog_id" id="blog_id" value="<?= $blog_id ?>">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="contents" class="summernote" id="summernote" required> <?= $contents ?> </textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button type="submit" id="submit" class="btn btn-primary"><?= $valueAction ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: "500px",
            width: "100%",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?= site_url('BlogAdmin/Blog/upload_image/' . $blog_id) ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                beforeSend: function() {
                    swal.fire({
                        title: 'Uploading Image',
                        text: 'will be close at upload finished',
                        allowOutsideClick: false,
                        onOpen: function() {
                            swal.showLoading()
                        }
                    })
                },
                success: function(url) {
                    swal.close()
                    $('#summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?= site_url('BlogAdmin/Blog/delete_image/' . $blog_id) ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

    });
</script>

<script type="text/javascript">
    function ValidasiPhoto() {
        var button_submit = document.getElementById('submit');
        //========================= DEKLARASI BANNER ========================
        if (document.getElementById('banner').value != "") {
            var inputFile1 = document.getElementById('banner');
            var pathFile1 = inputFile1.value;
            var file_size1 = $('#banner')[0].files[0].size;
        } else {
            var inputFile1 = "";
            var cekData1 = "";
            var pathFile1 = "";
            var file_size1 = "";
        }
        //========================= END DEKLARASI BANNER ========================
        //========================= DEKLARASI THUMBNAIL ========================
        if (document.getElementById('thumbnail').value != "") {
            var inputFile2 = document.getElementById('thumbnail');
            var pathFile2 = inputFile2.value;
            var file_size2 = $('#thumbnail')[0].files[0].size;
        } else {
            var inputFile2 = "";
            var cekData2 = "";
            var pathFile2 = "";
            var file_size2 = "";
        }
        //========================= END DEKLARASI THUMBNAIL ========================

        if (inputFile1 != "" && file_size1 > 1000000) { //DOC BANNER
            $("#file_error_banner").html(
                '<span style="color:red; text-transform: none; font-size: 12px;"> File Melebihi 1 Mb </span>');
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_banner').innerHTML = '<img src="' + e.target.result +
                    '" style="margin-bottom:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
            };
            reader.readAsDataURL(inputFile1.files[0]);

            if (inputFile1.files && inputFile1.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_banner').innerHTML = '<img src="' + e.target.result +
                        '" style="margin-bottom:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
                    document.getElementById("submit").disabled = true;
                };
                reader.readAsDataURL(inputFile1.files[0]);
            }

            //return false;
        } else if (inputFile1 != "" && file_size2 < 1000000) {
            var hasil1 = file_size1 / 1024;
            $("#file_error_banner").html(
                '<span style="color:green; text-transform: none; font-size: 12px;"> File Size : ' + hasil1.toFixed(2) +
                ' Kb </span>');
        } else if (inputFile1 == "") {
            $("#file_error_banner").html('');
            document.getElementById('preview_banner').innerHTML = '';
        } else {
            $("#file_error_banner").html('');
            document.getElementById('preview_banner').innerHTML = '';
        }


        if (inputFile2 != "" && file_size2 > 1000000) { //DOC THUMBNAIL
            $("#file_error_thumbnail").html(
                '<span style="color:red; text-transform: none; font-size: 12px;"> File Melebihi 1 Mb </span>');
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_thumbnail').innerHTML = '<img src="' + e.target.result +
                    '" style="margin-bottom:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
            };
            reader.readAsDataURL(inputFile2.files[0]);

            if (inputFile2.files && inputFile2.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_thumbnail').innerHTML = '<img src="' + e.target.result +
                        '" style="margin-bottom:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
                    document.getElementById("submit").disabled = true;
                };
                reader.readAsDataURL(inputFile2.files[0]);
            }
        } else if (inputFile2 != "" && file_size2 < 1000000) {
            var hasil2 = file_size2 / 1024;
            $("#file_error_thumbnail").html(
                '<span style="color:green; text-transform: none; font-size: 12px;"> File Size : ' + hasil2.toFixed(2) +
                ' Kb </span>');
        } else if (inputFile2 == "") {
            $("#file_error_thumbnail").html('');
            document.getElementById('preview_thumbnail').innerHTML = '';
        } else {
            $("#file_error_thumbnail").html('');
            document.getElementById('preview_thumbnail').innerHTML = '';
        }

        // ========================================= Preview gambar ==================================================
        if (inputFile1 != "" || inputFile2 != "") {
            if (inputFile1.files && inputFile1.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_banner').innerHTML = '<img src="' + e.target.result +
                        '" style="margin-bottom:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
                };
                reader.readAsDataURL(inputFile1.files[0]);
            }
            if (inputFile2.files && inputFile2.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_thumbnail').innerHTML = '<img src="' + e.target.result +
                        '" style="margin-bottom:2%; background-position: center; background-size: cover; width: 100%; height: auto;"/>';
                };
                reader.readAsDataURL(inputFile2.files[0]);
            }

            if (file_size1 > 1000000 || file_size2 > 1000000) {
                document.getElementById("submit").disabled = true;
            } else {
                document.getElementById("submit").disabled = false;
            }
        }
    }
</script>