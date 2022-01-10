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
                            <a href="<?= base_url() ?>BlogAdmin/Blog_Act/RestoreAll">
                                <button id="restoreAll_blog" class="btn btn-primary btn-sm"> Restore All</button>
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
                                Trash Data Blog Mulsk
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#trash" role="tab">
                                        Trash
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="trash">
                                <div class="kt-widget4">
                                    <table id="table_1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Create Date</th>
                                                <th>Create By</th>
                                                <th>Deleted Date</th>
                                                <th>Deleted By</th>
                                                <th style="width:15%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Create Date</th>
                                            <th>Create By</th>
                                            <th>Deleted Date</th>
                                            <th>Deleted By</th>
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
                                                    "url": "<?= site_url("BlogAdmin/DatatablesBlog/trashBlog") ?>",
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

                                        function deletePermanent(id) {
                                            swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                type: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then(function(result) {
                                                if (result.value) {
                                                    $.ajax({
                                                        type: "POST",
                                                        data: "id=" + id,
                                                        url: "<?= site_url('BlogAdmin/Blog_Act/DeletePermanent') ?>/" + id,
                                                        cache: false,
                                                        success: function(msg) {
                                                            swal.fire(
                                                                'Deleted!',
                                                                'Your file has been deleted.',
                                                                'success'
                                                            );

                                                            window.location.href = "<?= site_url('BlogAdmin/Blog/T_BlogTrash') ?>";
                                                        }
                                                    });
                                                }
                                            });
                                        }
                                    </script>
                                    <!-- ============================== END SHOW AJAX JSON DATATABLES ========================================= -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/New Users-->
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>