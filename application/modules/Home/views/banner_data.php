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

        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <div class="pull-right">
                            <a href="<?= base_url() ?>Home/Banner/Input">
                                <button id="create_blog" class="btn btn-primary btn-sm"> Input New Banner</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-12">

                <!--begin:: Widgets/New Users-->
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Data Blog Mulsk
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Datatable -->
                        <table class="table table-striped table-bordered table-hover table-checkable" id="Datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Desktop Banner</th>
                                    <th>Mobile Banner</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($home_banner as $key => $vData) { ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><img src="<?= base_url() ?>/assets/media/banner/<?= $vData['banner_desktop'] ?>"></td>
                                        <td><img src="<?= base_url() ?>/assets/media/banner/<?= $vData['banner_mobile'] ?>"></td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <!-- <button type="button" class="btn btn-outline-success btn-icon" data-toggle="modal" data-target="#user_detail" onclick="get_data_user(<?= $vData['id_banner'] ?>)"><i class="fa fa-eye"></i></button> -->
                                                <a type="button" href="<?= base_url() ?>Administrator/show/home_banner/Update/<?= $vData['banner_id'] ?>" class="btn btn-outline-info btn-icon"><i class="fa fa-pen"></i></a>
                                                <a type="button" href="<?= base_url() ?>Administrator/action/home_banner/Delete/<?= $vData['banner_id'] ?>" class="btn btn-outline-danger btn-icon" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <!--end: Datatable -->
                    </div>
                </div>
                <!--end:: Widgets/New Users-->

            </div>
        </div>
    </div>
</div>