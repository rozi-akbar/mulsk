<?php

if ($action == "edit") {
    foreach ($data_blog as $vaBlog) {
        $id         = $vaBlog['id_blog'];
        $title      = $vaBlog['title'];
        $caption    = $vaBlog['caption'];
        $contents   = $vaBlog['content'];
        $banner     = $vaBlog['banner_blog'];
        $thumbnail  = $vaBlog['thumbnail_blog'];
    }
    $valueAction = "Save Change";
    $fAction = 'UpdateBlog/' . $id;
} else {
    $id         = "";
    $title      = "";
    $caption    = "";
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
                                Blog Mulsk
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="<?= site_url('BlogAdmin/Blog_Act/' . $fAction); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?= $title ?>" required>
                                        <input type="hidden" name="blog_id" id="blog_id" value="<?= $blog_id ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Caption</label>
                                        <textarea name="caption" class="form-control" placeholder="Caption" required><?= $caption ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Thumbnail <span id="file_error_thumbnail"></span></label>
                                        <input type="file" name="thumbnail" id="thumbnail" onchange="loadFileThumbnail(this, event)" class="form-control" accept="image/x-png,image/jpeg">
                                        <input type="hidden" name="old_url_thumbnail" value="<?= $thumbnail ?>">
                                        <span class="form-text text-muted">
                                            <ol>
                                                <li>Allowed File - <b>images(jpeg,jpg,png).</b></li>
                                                <li>Max Size 2Mb</li>
                                                <li>Dimensi : 1000px x 750px</li>
                                            </ol>
                                        </span>
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

                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Banner Blog <span id="file_error_banner"></span></label>
                                        <input type="file" name="banner" id="banner" onchange="loadFileBanner(this, event)" class="form-control" accept="image/x-png,image/jpeg">
                                        <input type="hidden" name="old_url_banner" value="<?= $banner ?>">
                                        <span class="form-text text-muted">
                                            <ol>
                                                <li>Allowed File - <b>images(jpeg,jpg,png).</b></li>
                                                <li>Max Size 2Mb</li>
                                                <li>Dimensi : 1920px x 250px</li>
                                            </ol>
                                        </span>
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
                                    <div id="preview_ImgBanner"> </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <textarea name="contents" class="summernote" id="summernote" required> <?= $contents ?> </textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Include</label>
                                        <select class="form-control kt-select2" id="kt_select2_3" name="pi[]" multiple="multiple">
                                            <?php
                                            foreach ($dataMaster as $vaMasterP) {
                                            ?>
                                                <option value="<?= $vaMasterP['id'] ?>">
                                                    <?= $vaMasterP['nama_product'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label> <b class="text-warning">
                                                <?php
                                                foreach ($product_selected as $rowP) {
                                                    echo $rowP['nama_product'] . "; ";
                                                }
                                                ?>
                                            </b>
                                        </label>
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
<script src="<?= base_url() ?>assets/js/summernote/summernote-image-attributes.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: "500px",
            width: "100%",
            maximumImageFileSize: 2048 * 1024, // 500 KB
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
            callbacks: {
                onImageUploadError: function(msg) {
                    swal.fire("Sorry!", "File Type Not Allowed!", "error");
                },
                onImageUpload: function(image) {
                    if (image[0].size > 2000000) {
                        swal.fire("Sorry!", "File Size too Big!", "error");
                    } else {
                        uploadImage(image[0]);
                    }
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
                    swal.fire("Sorry!", "File Type Not Allowed!", "error");
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
    loadFileThumbnail = (c, event) => {
        ext = this.GetExtension(c.value);

        if (ext == 'jpg' || ext == 'jpeg' || ext == 'png') {
            if (event.target.files[0].size > 2000000) {
                swal.fire("Sorry!", "File Size too Big!", "error");
                c.value = null;
                document.getElementById('preview_thumbnail').innerHTML = '';

                console.log(event.target.files[0]);
            } else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_thumbnail').innerHTML = '<img src="' + e.target.result +
                        '" style="width:50%; margin:2%;"/>';
                };
                reader.readAsDataURL(event.target.files[0]);

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_thumbnail').innerHTML = '<img src="' + e.target.result +
                        '" style="width:50%; margin:2%;"/>';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        } else {
            swal.fire("Sorry!", "File Type Not Allowed!", "error");
            c.value = null;
            document.getElementById('preview_thumbnail').innerHTML = '';
        }
    }

    loadFileBanner = (d, event) => {
        ext = this.GetExtension(d.value);

        if (ext == 'jpg' || ext == 'jpeg' || ext == 'png') {
            if (event.target.files[0].size > 2000000) {
                swal.fire("Sorry!", "File Size too Big!", "error");
                d.value = null;
                document.getElementById('preview_ImgBanner').innerHTML = '';

                console.log(event.target.files[0]);
            } else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_ImgBanner').innerHTML = '<img src="' + e.target.result +
                        '" style="width:50%; margin:2%;"/>';
                };
                reader.readAsDataURL(event.target.files[0]);

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_ImgBanner').innerHTML = '<img src="' + e.target.result +
                        '" style="width:50%; margin:2%;"/>';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        } else {
            swal.fire("Sorry!", "File Type Not Allowed!", "error");
            d.value = null;
            document.getElementById('preview_ImgBenefits').innerHTML = '';
        }

    }

    function GetExtension(path) {
        var ext = path.split(/[\\./]/).pop();
        return ext.toLowerCase();
    }
</script>