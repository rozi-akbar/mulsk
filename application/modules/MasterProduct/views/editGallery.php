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
                        <form action="<?= site_url('MasterProduct/M_Product_Act/EditGallery/' . $id_master . '/' . $data_gallery['id'] . '/' . $productName); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label> Gambar Sebelumnya <label>
                                                <img src="<?= base_url() ?><?= $data_gallery['url_image'] ?>" style="width:100%; height:auto;">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_gallery" name="p_gallery" accept="image/x-png,image/jpeg" multiple="" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="submit" class="btn btn-primary"> Save Change </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>