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

        <div class="kt-wizard-v4" id="kt_wizard_v4" data-ktwizard-state="step-first">
            <form action="<?= site_url('MasterProduct/M_Product_Act/ProductData'); ?>" method="post" enctype="multipart/form-data">
                <!--begin: Form Wizard Nav -->
                <div class="kt-wizard-v4__nav">
                    <div class="kt-wizard-v4__nav-items">

                        <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                        <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                            <div class="kt-wizard-v4__nav-body">
                                <div class="kt-wizard-v4__nav-number">
                                    1
                                </div>
                                <div class="kt-wizard-v4__nav-label">
                                    <div class="kt-wizard-v4__nav-label-title">
                                        Main Description
                                    </div>
                                    <div class="kt-wizard-v4__nav-label-desc">
                                        Setup Your Main Description
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                            <div class="kt-wizard-v4__nav-body">
                                <div class="kt-wizard-v4__nav-number">
                                    2
                                </div>
                                <div class="kt-wizard-v4__nav-label">
                                    <div class="kt-wizard-v4__nav-label-title">
                                        Product Gallery
                                    </div>
                                    <div class="kt-wizard-v4__nav-label-desc">
                                        Setup Your Product Gallery
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                            <div class="kt-wizard-v4__nav-body">
                                <div class="kt-wizard-v4__nav-number">
                                    3
                                </div>
                                <div class="kt-wizard-v4__nav-label">
                                    <div class="kt-wizard-v4__nav-label-title">
                                        Product Benefits
                                    </div>
                                    <div class="kt-wizard-v4__nav-label-desc">
                                        Setup Your Product Benefits
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                            <div class="kt-wizard-v4__nav-body">
                                <div class="kt-wizard-v4__nav-number">
                                    4
                                </div>
                                <div class="kt-wizard-v4__nav-label">
                                    <div class="kt-wizard-v4__nav-label-title">
                                        Publish
                                    </div>
                                    <div class="kt-wizard-v4__nav-label-desc">
                                        Publish Your Product
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end: Form Wizard Nav -->
                <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-grid">
                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                                <!--begin: Form Wizard Form-->
                                <div class="kt-form row" id="kt_form">
                                    <div class="col-12">
                                        <!--begin: Form Wizard Step 1-->
                                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                            <div class="kt-heading kt-heading--md">Setup your Main Description Product</div>
                                            <div class="kt-form__section kt-form__section--first">
                                                <div class="kt-wizard-v4__form">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Name</label>
                                                                <input type="text" name="productName" class="form-control" placeholder="Product Name" value="<?= $dataMaster['nama_product'] ?>">
                                                                <input type="hidden" name="productId" value="<?= $dataMaster['product_id'] ?>">
                                                                <input type="hidden" name="oldUrl_thumbnail" value="<?= $dataMaster['image'] ?>">
                                                                <input type="hidden" name="oldUrl_benefits" value="<?= $dataMaster['benefits_image'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Price</label>
                                                                <input type="number" name="price" id="price" value="<?= $dataMaster['price'] ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Image Thumbnail</label>
                                                                <input type="file" name="imageThumbnail" id="image" class="form-control" accept="image/x-png,image/jpeg">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Existing Thumbnail</label>
                                                                <br />
                                                                <img src="<?= base_url() . $dataMaster['image'] ?>" style="width: 30%;">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Description Product</label>
                                                                <textarea name="deskripsi" class="summernote" id="summernote_desc"> <?= $dataMaster['deskripsi'] ?> </textarea>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-12">
                                                            <div class="form-group">
                                                                <label> Upload Gallery Color Selector </label>
                                                                <table id="table_field_galleryWOC" class="table table-bordered">
                                                                    <thead>
                                                                        <th>Image</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_galleryWOC" name="p_galleryWOC[]" accept="image/x-png,image/jpeg" multiple="" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="button" class="btn btn-warning btn-sm" id="add_galleryWOC" name="add_galleryWOC" value="Add" />
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div> -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Form Wizard Step 1-->

                                        <!--begin: Form Wizard Step 2-->
                                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                            <div class="kt-heading kt-heading--md">Setup Your Gallery</div>
                                            <div class="kt-form__section kt-form__section--first">
                                                <div class="kt-wizard-v4__form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label> Image Gallery </label>
                                                                <div class="row">
                                                                    <?php
                                                                    if (empty($product_gallery)) {
                                                                    } else {
                                                                        foreach ($product_gallery as $vaGall) {
                                                                    ?>
                                                                            <div class="col-12 col-md-2">
                                                                                <div class="form-group">
                                                                                    <a class="btn btn-warning" href="<?= site_url('MasterProduct/M_Product/Edit_Gallery/' . $dataMaster['id'] . '/' . $vaGall['id'] . '/' . $dataMaster['nama_product']) ?>">
                                                                                        Edit Photo
                                                                                    </a>
                                                                                    <br />
                                                                                    <img src="<?= base_url() ?><?= $vaGall['url_image'] ?>" style="width:80%; height:auto;">

                                                                                    <?php
                                                                                    if ($vaGall['color'] == "" && empty($vaGall['color_name'])) {
                                                                                    } else {
                                                                                    ?>
                                                                                        <label>
                                                                                            Color : <?= $vaGall['color_name'] ?>
                                                                                            <input type="color" class="form-control" disabled value="<?= $vaGall['color'] ?>">
                                                                                        </label>
                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                            </div>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label> Add More Gallery </label>
                                                                <table id="table_field_gallery" class="table table-bordered">
                                                                    <thead>
                                                                        <th>Image</th>
                                                                        <th>Color Picker</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_gallery" name="p_gallery[]" accept="image/x-png,image/jpeg" multiple="" />
                                                                            </td>
                                                                            <td>
                                                                                <select name="color_hex[]" class="form-control">
                                                                                    <option value="">Pick Color</option>
                                                                                    <?php
                                                                                    foreach ($data_shade_color as $key1 => $vaColor1) {
                                                                                    ?>
                                                                                        <option value="<?= $vaColor1['id'] ?>" style="background-color: <?= $vaColor1['color'] ?> !important;"><?= $vaColor1['color_name'] ?></option>
                                                                                        <!-- <option data-content="<span class='kt-badge kt-badge--inline kt-badge--rounded' style='background-color:<?= $vaColor1['color'] ?>;'><?= $vaColor1['color_name'] ?></span>" value="<?= $vaColor1['id'] ?>"><?= $vaColor1['color_name'] ?></option> -->
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="button" class="btn btn-warning btn-sm" id="add_gallery" name="add_gallery" value="Add" />
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="kt-section">
                                                                    <div class="kt-section__content">
                                                                        <div class="alert alert-secondary" role="alert">
                                                                            <div class="alert-text">
                                                                                <p><span> <strong>Ratio</strong> => 3 : 4</span></p>
                                                                                <p><span> <strong>Recomended Size</strong> => 600 x 800 px</span></p>
                                                                                <p><span> <strong>File Type</strong> => JPG, PNG, JPEG</span></p>
                                                                                <p><span> <strong>File Size</strong> => 500 Kb</span></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Form Wizard Step 2-->

                                        <!--begin: Form Wizard Step 3-->
                                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                            <div class="kt-heading kt-heading--md">Setup Your Product Benefits</div>
                                            <div class="kt-form__section kt-form__section--first">
                                                <div class="kt-wizard-v4__form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Benefits Product</label>
                                                                <textarea name="benefits" class="summernote" id="summernote_benefits"> <?= $dataMaster['benefits'] ?> </textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Benefits Image</label>
                                                                <input type="file" name="imageBenefits" id="imageBenefits" class="form-control" accept="image/x-png">
                                                                <br />
                                                                <div class="kt-section">
                                                                    <div class="kt-section__content">
                                                                        <div class="alert alert-secondary" role="alert">
                                                                            <div class="alert-text">
                                                                                <p><span> <strong>Ratio</strong> => 1 : 1</span></p>
                                                                                <p><span> <strong>File Type</strong> => PNG ONLY</span></p>
                                                                                <p><span> <strong>File Size</strong> => 500 Kb</span></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Existing Benefits Image</label>
                                                                <br />
                                                                <img src="<?= base_url() . $dataMaster['benefits_image'] ?>" style="width: 50%;">
                                                            </div>
                                                        </div>

                                                        <?php
                                                        if (empty($product_icon)) {
                                                        } else {
                                                            foreach ($product_icon as $vaIcon) {
                                                                // echo $vaGall['id'] . " | " . $vaGall['url_image'] . "<br />";
                                                        ?>
                                                                <div class="col-3">
                                                                    <div class="form-group">
                                                                        <a class="btn btn-warning" href="<?= site_url('MasterProduct/M_Product/EditProductIcon/' . $dataMaster['id'] . '/' . $vaIcon['id'] . '/' . $dataMaster['nama_product']) ?>">
                                                                            Edit Icon
                                                                        </a>
                                                                        <!--begin::Portlet-->
                                                                        <div class="kt-portlet kt-portlet--bordered">
                                                                            <div class="kt-portlet__body">
                                                                                <div class="kt-portlet__head-label">
                                                                                    <svg width="80%" viewBox="0 0 45 45">
                                                                                        <image x="0" y="0" width="10" height="10" id="knight" xlink:href="<?= base_url() ?><?= $vaIcon['url_product_icon'] ?>" />
                                                                                        <!-- <img src="<?= base_url() ?><?= $vaIcon['url_product_icon'] ?>" style="width:80%; height:auto;"> -->
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="kt-portlet__body">
                                                                                <?= $vaIcon['description_product_icon'] ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label> Add More Product Icon </label>
                                                        <table id="table_field_icon" class="table table-bordered">
                                                            <thead>
                                                                <th>Product Icon</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td> <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_icon" name="p_icon[]" accept="image/x-png,image/svg+xml" multiple="" /> </td>
                                                                    <td> <textarea class="form-control" id="pi_desc" name="pi_desc[]"></textarea> </td>
                                                                    <td> <input type="button" class="btn btn-warning btn-sm" id="add_pi" name="add_pi" value="Add" /> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="kt-section">
                                                            <div class="kt-section__content">
                                                                <div class="alert alert-secondary" role="alert">
                                                                    <div class="alert-text">
                                                                        <p><span> <strong>File Type</strong> => JPG / SVG</span></p>
                                                                        <p><span> <strong>File Size</strong> => 100 Kb</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Form Wizard Step 3-->

                                        <!--begin: Form Wizard Step 4-->
                                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                            <div class="kt-heading kt-heading--md">Publish your Details and Submit</div>
                                            <div class="kt-form__section kt-form__section--first">
                                                <div class="kt-wizard-v4__review">
                                                    <div class="form-group">
                                                        <?php
                                                        if ($publish == 1) {
                                                            $checked = "checked";
                                                        } else {
                                                            $checked = "";
                                                        }
                                                        ?>
                                                        <input <?= $checked ?> data-switch="true" data-ktwizard-state="1" type="checkbox" name="publish" data-on-color="success" data-off-color="warning">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Form Wizard Step 4-->
                                    </div>
                                </div>
                                <!--end: Form Actions -->


                                <!--end: Form Wizard Form-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-form__actions">
                    <button type="submit" id="simpan" onclick="save()" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                        Save Changes
                    </button>
                    <div id="sending"> </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>

<script type="text/javascript">
    function save() {
        document.getElementById("simpan").style.display = "none";
        document.getElementById("sending").innerHTML =
            '<button type="button" class="btn btn-warning btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" disabled>Sending Data...</button>';
    }

    $(document).ready(function() {
        $('#summernote_desc').summernote({
            height: "500px",
            width: "100%",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
            ]
        });

        $('#summernote_benefits').summernote({
            height: "500px",
            width: "100%",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
            ]
        });
    });

    $(document).ready(function() {
        var html = '<tr><td> <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_gallery" name="p_gallery[]" accept="image/x-png,image/jpeg" multiple="" required/> </td><td> <select name="color_hex[]" class="form-control" id="color_hex"> <option>Pick Color</option><?php foreach ($data_shade_color as $key => $vaColor) { ?> <option value="<?= $vaColor['id'] ?>" style="background-color: <?= $vaColor['color'] ?> !important;"><?= $vaColor['color_name'] ?></option> <?php } ?></select> </td><td> <input type="button" class="btn btn-danger btn-sm" id="remove_gallery" name="remove_gallery" value="Remove" /> </td></tr>';
        var max = 10;
        var x = 1;

        $("#add_gallery").click(function() {
            if (x < max) {
                $("#table_field_gallery").append(html);
                x++;
            }
        });

        $("#table_field_gallery").on('click', '#remove_gallery', function() {
            $(this).closest('tr').remove();
            x--;
        });
    });

    // $(document).ready(function() {
    //     var html = '<tr><td> <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_galleryWOC" name="p_galleryWOC[]" accept="image/x-png,image/jpeg" multiple="" required/> </td><td> <input type="button" class="btn btn-danger btn-sm" id="remove_galleryWOC" name="remove_galleryWOC" value="Remove" /> </td></tr>';
    //     var max = 10;
    //     var x = 1;

    //     $("#add_galleryWOC").click(function() {
    //         if (x < max) {
    //             $("#table_field_galleryWOC").append(html);
    //             x++;
    //         }
    //     });

    //     $("#table_field_galleryWOC").on('click', '#remove_galleryWOC', function() {
    //         $(this).closest('tr').remove();
    //         x--;
    //     });
    // });

    $(document).ready(function() {
        var html = '<tr><td> <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_icon" name="p_icon[]" accept="image/x-png,image/svg+xml" multiple="" required/> </td><td> <textarea class="form-control" id="pi_desc" name="pi_desc[]"></textarea> </td><td> <input type="button" class="btn btn-danger btn-sm" id="remove_pi" name="remove_pi" value="Remove" /> </td></tr>';
        var max = 10;
        var x = 1;

        $("#add_pi").click(function() {
            if (x < max) {
                $("#table_field_icon").append(html);
                x++;
            }
        });

        $("#table_field_icon").on('click', '#remove_pi', function() {
            $(this).closest('tr').remove();
            x--;
        });
    });
</script>