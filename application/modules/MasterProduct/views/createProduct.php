<?php
if ($action == "edit") {
    
    $valueAction = "Save Change";
    $fAction = 'Update/' . $id;
} else {
    
    $valueAction = "Save";
    $fAction = 'Insert/' . $blog_id;
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
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Create Product
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="<?= site_url('M_Product_Act/CreateMasterProduct/'.$fAction); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="namaProduct" class="form-control" placeholder="Nama" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="submit" class="btn btn-primary"><?= $valueAction ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Product Data
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>