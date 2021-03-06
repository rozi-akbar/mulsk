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
            <form action="<?= site_url('MasterProduct/M_Product_Act/ProductDataInsert'); ?>" method="post" enctype="multipart/form-data" onsubmit="return save()">
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
                                                                <input type="text" id="namaProduct" name="namaProduct" class="form-control product-name" placeholder="Product Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Price</label>
                                                                <input type="number" name="price" id="price" value="<?= $price ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Image Thumbnail</label>
                                                                <input type="file" name="image" id="image" class="form-control" accept="image/x-png,image/jpeg" onchange="loadFileThumbnail(this, event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <img style="width: 20%; margin:2%;" src="<?= base_url() ?>assets/images/image2x.png" id="defaultThumbnail" alt="your image" />
                                                                <div id="preview_thumbnail"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Description Product</label>
                                                                <textarea name="deskripsi" class="summernote" id="summernote_desc"> </textarea>
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
                                                                                <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_galleryWOC" name="p_galleryWOC[]" accept="image/x-png,image/jpeg" multiple="" required />
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
                                                                <label> Upload Gallery </label>
                                                                <table id="table_field_gallery" class="table table-bordered">
                                                                    <thead>
                                                                        <th>Image</th>
                                                                        <th>Color Picker</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm staticArr" id="p_gallery" name="p_gallery[]" accept="image/x-png,image/jpeg" multiple="" onchange="loadFileGallery(this, event)" />
                                                                            </td>
                                                                            <td>
                                                                                <select name="color_hex[]" class="form-control">
                                                                                    <option value="">Pick Color</option>
                                                                                    <?php
                                                                                    foreach ($data_shade_color as $key1 => $vaColor1) {
                                                                                    ?>
                                                                                        <option value="<?= $vaColor1['id'] ?>" style="background-color: <?= $vaColor1['color'] ?> !important;"><?= $vaColor1['color_name'] ?></option>
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
                                                                <textarea name="benefits" class="summernote" id="summernote_benefits"> </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Benefits Image</label>
                                                                <input type="file" name="imageBenefits" id="imageBenefits" class="form-control" accept="image/x-png" onchange="loadFileBenefits(this, event)">
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
                                                            <img style="width: 20%; margin:2%;" src="<?= base_url() ?>assets/images/image2x.png" id="defaultBenefits" alt="your image" />
                                                            <div id="preview_ImgBenefits"></div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <table id="table_field_icon" class="table table-bordered">
                                                                    <thead>
                                                                        <th>Product Icon</th>
                                                                        <th>Description</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td> <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_icon" name="p_icon[]" accept="image/jpeg,image/svg+xml" multiple="" onchange="loadFileIcon(this, event)" required /> </td>
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
                    <button type="submit" id="simpan" onclick="save()" class="btn btn-primary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                        Save
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
    var input = document.querySelector('input.product-name');
    input.addEventListener('keyup', function(e) {
        this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
    });

    function save() {
        var namaProduk = document.getElementById('namaProduct').value;
        var price = document.getElementById('price').value;
        var image = document.getElementById('p_galleryWOC').value.replace(/.*(\/|\\)/, '');
        var p_icon = document.getElementById('p_icon').value.replace(/.*(\/|\\)/, '');
        if (namaProduk == "") {
            alert("Nama Produk Belum Di Isi!");
            return false;
        } else if (price == "") {
            alert("Price Produk Belum Di Isi!");
            return false;
        } else if (image == "") {
            alert("Image Gallery Produk Belum Di Isi!");
            return false;
        } else if (p_icon == "") {
            alert("Icon Produk Belum Di Isi!");
            return false;
        } else {
            document.getElementById("simpan").style.display = "none";
            document.getElementById("sending").innerHTML =
                '<button type="button" class="btn btn-warning btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" disabled>Sending Data...</button>';
            return true;
        }
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
        var html = '<tr><td> <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_gallery" name="p_gallery[]" accept="image/x-png,image/jpeg" multiple="" onchange="loadFileGallery(this, event)" required/> </td><td> <select name="color_hex[]" class="form-control" id="color_hex"> <option>Pick Color</option><?php foreach ($data_shade_color as $key => $vaColor) { ?> <option value="<?= $vaColor1['id'] ?>" style="background-color: <?= $vaColor['color'] ?> !important;"><?= $vaColor['color_name'] ?></option> <?php } ?></select> </td><td> <input type="button" class="btn btn-danger btn-sm" id="remove_gallery" name="remove_gallery" value="Remove" /> </td></tr>';
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

    $(document).ready(function() {
        var html = '<tr><td> <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_icon" name="p_icon[]" accept="image/jpeg,image/svg+xml" multiple="" onchange="loadFileIcon(this, event)" required/> </td><td> <textarea class="form-control" id="pi_desc" name="pi_desc[]"></textarea> </td><td> <input type="button" class="btn btn-danger btn-sm" id="remove_pi" name="remove_pi" value="Remove" /> </td></tr>';
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

    loadFileGallery = (a, event) => {
        ext = this.GetExtension(a.value);

        if (ext == 'png' || ext == 'jpg' || ext == 'jpeg') {
            if (event.target.files[0].size > 500000) {
                swal.fire("Sorry!", "File Size too Big!", "error");
                a.value = null;

                console.log(event.target.files[0]);
            } else {}
        } else {
            swal.fire("Sorry!", "File Type Not Allowed!", "error");
            a.value = null;
        }
    }

    loadFileIcon = (b, event) => {
        ext = this.GetExtension(b.value);

        if (ext == 'jpg' || ext == 'svg') {
            if (event.target.files[0].size > 100000) {
                swal.fire("Sorry!", "File Size too Big!", "error");
                b.value = null;

                console.log(event.target.files[0]);
            } else {}
        } else {
            swal.fire("Sorry!", "File Type Not Allowed!", "error");
            b.value = null;
        }

    }

    loadFileThumbnail = (c, event) => {
        ext = this.GetExtension(c.value);

        if (ext == 'jpg' || ext == 'jpeg' || ext == 'png') {
            if (event.target.files[0].size > 500000) {
                swal.fire("Sorry!", "File Size too Big!", "error");
                c.value = null;
                document.getElementById('preview_thumbnail').innerHTML = '';
                document.getElementById("defaultThumbnail").style.display = "block";

                console.log(event.target.files[0]);
            } else {
                document.getElementById("defaultThumbnail").style.display = "none";
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
            document.getElementById("defaultThumbnail").style.display = "block";
        }
    }

    loadFileBenefits = (d, event) => {
        ext = this.GetExtension(d.value);

        if (ext == 'png') {
            if (event.target.files[0].size > 500000) {
                swal.fire("Sorry!", "File Size too Big!", "error");
                d.value = null;
                document.getElementById('preview_ImgBenefits').innerHTML = '';
                document.getElementById("defaultBenefits").style.display = "block";

                console.log(event.target.files[0]);
            } else {
                document.getElementById("defaultBenefits").style.display = "none";

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_ImgBenefits').innerHTML = '<img src="' + e.target.result +
                        '" style="width:50%; margin:2%;"/>';
                };
                reader.readAsDataURL(event.target.files[0]);

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_ImgBenefits').innerHTML = '<img src="' + e.target.result +
                        '" style="width:50%; margin:2%;"/>';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        } else {
            swal.fire("Sorry!", "File Type Not Allowed!", "error");
            d.value = null;
            document.getElementById('preview_ImgBenefits').innerHTML = '';
            document.getElementById("defaultBenefits").style.display = "block";
        }

    }

    function GetExtension(path) {
        var ext = path.split(/[\\./]/).pop();
        return ext.toLowerCase();
    }
</script>