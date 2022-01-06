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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Edit Photo
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="<?= site_url('MasterProduct/M_Product_Act/EditGallery/' . $id_master . '/' . $data_gallery['id'] . '/' . $productName); ?>" method="post" enctype="multipart/form-data" onsubmit="return saveChanges()">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label> Gambar Sebelumnya <label>
                                                <img src="<?= base_url() ?><?= $data_gallery['url_image'] ?>" style="width:100%; height:auto;">
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>Image</th>
                                                <!-- <th>Color Picker</th>
                                                <th>Color Name</th> -->
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_gallery" name="p_gallery" accept="image/x-png,image/jpeg" multiple="" />
                                                    </td>
                                                    <td>
                                                        <select name="color_hex" class="form-control">
                                                            <option value="">Pick Color</option>
                                                            <?php
                                                            foreach ($data_shade_color as $key1 => $vaColor1) {
                                                            ?>
                                                                <option value="<?= $vaColor1['id'] ?>" style="background-color: <?= $vaColor1['color'] ?> !important;" <?php if ($vaColor1['id'] == $data_gallery['id_color']) { ?> selected <?php } ?>><?= $vaColor1['color_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span id="sending"> </span>
                                    <button type="submit" id="update" onclick="saveChanges()" title="Save Change" id="submit" class="btn btn-primary"> Save Change </button>
                                    <a href="<?= base_url() ?>/MasterProduct/M_Product_Act/DeleteGallery/<?= $id_master ?>/<?= $data_gallery['id'] ?>" class="btn btn-danger btn-icon" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
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

<script type="text/javascript">
    function saveChanges() {
        document.getElementById("update").style.display = "none";
        document.getElementById("sending").innerHTML =
            '<button type="button" class="btn btn-warning btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" disabled>Sending Data...</button>';
    }
</script>