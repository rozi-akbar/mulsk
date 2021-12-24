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
                                Edit Color Selector
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="<?= site_url('MasterProduct/M_Product_Act/EditColorSelector/' . $id_master . '/' . $data_color_selector['id'] . '/' . $productName); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <?php
                                        if (empty($data_gallery)) {
                                        } else {
                                            foreach ($data_gallery as $vaGall) {
                                                // echo $vaGall['id'] . " | " . $vaGall['url_image'] . "<br />";
                                        ?>

                                                <div class="col-3">
                                                    <div class="form-group">

                                                        <label> Nama : <b> <?= $productName ?> - <?= $vaGall['id'] ?> </b> </label>
                                                        <img src="<?= base_url() ?><?= $vaGall['url_image'] ?>" style="width:100%; height:auto;">
                                                    </div>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <table id="table_field_color" class="table table-bordered">
                                            <thead>
                                                <th>Select Image</th>
                                                <th>Select Color</th>
                                                <th>Color Name</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select name="colorSelector" class="form-control kt-selectpicker">
                                                            <option>PILIH IMAGE</option>
                                                            <?php
                                                            $no = 0;
                                                            foreach ($data_gallery as $vaPGall) {
                                                            ?>
                                                                <option value="<?= $vaPGall['id'] ?>-<?= ++$no ?>" <?php if ($vaPGall['id'] == $data_color_selector['id_product_image']) { ?> selected <?php } ?>>
                                                                    <?= $productName ?> - <?= $vaPGall['id'] ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="color" name="color_hex" class="form-control" value="<?= $data_color_selector['color'] ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="colorName" class="form-control" value="<?= $data_color_selector['color_name'] ?>">
                                                    </td>
                                                    <td>
                                                        <button type="submit" title="Save Change" id="submit" class="btn btn-primary"> <i class="fa fa-check"></i> </button>
                                                        <a href="<?= base_url() ?>/MasterProduct/M_Product_Act/DeleteColorSelector/<?= $id_master ?>/<?= $data_color_selector['id'] ?>">
                                                            <button title="Delete" class="btn btn-danger btn-icon">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>