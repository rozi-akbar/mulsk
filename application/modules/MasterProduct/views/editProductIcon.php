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
                                Edit Product Icon
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="<?= site_url('MasterProduct/M_Product_Act/EditProductIcon/' . $id_master . '/' . $data_product_icon['id'] . '/' . $productName); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label> Gambar Sebelumnya <label>
                                                <img src="<?= base_url() ?><?= $data_product_icon['url_product_icon'] ?>" style="width:100%; height:auto;">
                                                <span>
                                                    <p> <?= $data_product_icon['description_product_icon'] ?> </p>
                                                </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Upload Icon</label>
                                        <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="p_icon" name="p_icon" accept="image/x-png,image/svg+xml" multiple="" />
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" id="pi_desc" name="pi_desc"> <?= $data_product_icon['description_product_icon'] ?> </textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" title="Save Change" id="submit" class="btn btn-primary"> Save Change </button>
                                    <a href="<?= base_url() ?>/MasterProduct/M_Product_Act/DeleteProductIcon/<?= $id_master ?>/<?= $data_product_icon['id'] ?>">
                                        <button title="Delete" class="btn btn-danger btn-icon">
                                            <i class="fa fa-trash"></i>
                                        </button>
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