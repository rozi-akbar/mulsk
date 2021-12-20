<?php
if ($action == "edit") {
    foreach ($product as $vaProduct) {
        $id = $vaProduct['id'];
        $nama_product = $vaProduct['nama_product'];
    }
    $valueAction    = "Save Change";
    $fAction        = 'Update/' . $id;
} else {
    $id             = "";
    $nama_product   = "";
    $valueAction    = "Save";
    $fAction        = 'Insert/' . $blog_id;
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

        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                        <div class="pull-right">
                            <a href="<?= base_url() ?>MasterProduct/M_Product/CreateProduct">
                                <button id="create_product" class="btn btn-primary btn-sm"> Add Product</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                        <table id="table_1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Create Date</th>
                                    <th>Create By</th>
                                    <th>Update Date</th>
                                    <th>Update By</th>
                                    <th style="width:15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Create Date</th>
                                <th>Create By</th>
                                <th>Update Date</th>
                                <th>Update By</th>
                                <th style="width:15%;">Action</th>
                            </tfoot>
                        </table>
                        <script src="<?= base_url('assets/datatables/jquery/jquery-2.1.4.min.js') ?>"></script>
                        <script src="<?= base_url('assets/datatables/bootstrap/js/bootstrap.min.js') ?>"></script>
                        <script src="<?= base_url('assets/datatables/datatables/js/jquery.dataTables.min.js') ?>"></script>
                        <script src="<?= base_url('assets/datatables/datatables/js/dataTables.bootstrap.js') ?>"></script>
                        <script src="<?= base_url('assets/datatables/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>

                        <!-- ============================== SHOW AJAX JSON DATATABLES ========================================= -->
                        <script type="text/javascript">
                            var save_method; //for save method string
                            var table;

                            $(document).ready(function() {

                                //datatables
                                table = $('#table_1').DataTable({
                                    "responsive": true,
                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                                    "order": [], //Initial no order.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {
                                        "url": "<?= site_url("MasterProduct/DatatablesProduct/DT_MasterProduct") ?>",
                                        "type": "POST"
                                    },

                                    //Set column definition initialisation properties.
                                    "columnDefs": [{
                                        "targets": [-1], //last column
                                        "orderable": false, //set not orderable
                                    }, ],

                                });

                                //datepicker
                                $('.datepicker').datepicker({
                                    autoclose: true,
                                    format: "yyyy-mm-dd",
                                    todayHighlight: true,
                                    orientation: "top auto",
                                    todayBtn: true,
                                    todayHighlight: true,
                                });

                            });


                            function reload_table() {
                                table.ajax.reload(null, false); //reload datatable ajax 
                            }
                        </script>
                        <!-- ============================== END SHOW AJAX JSON DATATABLES ========================================= -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>