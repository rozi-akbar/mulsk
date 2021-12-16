<?php

if ($action == "edit") {
    foreach ($data_blog as $vaBlog) {
        $id         = $vaBlog['id_blog'];
        $title      = $vaBlog['title'];
        $contents   = $vaBlog['content'];
    }
    $valueAction = "Save Change";
    $fAction = 'UpdateBlog/' . $id;
} else {
    $id         = "";
    $title      = "";
    $contents   = "";
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
                        <form action="<?= site_url('Administrator/Blog_Act/' . $fAction); ?>" method="post">
                            <div class="row">
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
                                    <button type="submit" class="btn btn-primary"><?= $valueAction ?></button>
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
            height: "100vh",
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
                url: "<?= site_url('Administrator/Blog/upload_image/' . $blog_id) ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
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
                url: "<?= site_url('Administrator/Blog/delete_image/' . $blog_id) ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

    });
</script>