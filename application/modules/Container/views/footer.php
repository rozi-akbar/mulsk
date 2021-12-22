<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-footer__copyright">
            <?= date('Y') ?>&nbsp;&copy;&nbsp;<a href="#" target="_blank" class="kt-link">Mulsk Official Website</a>
        </div>

    </div>
</div>

<!-- end:: Footer -->
</div>
</div>
</div>


<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#22b9ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->

<!--begin:: Vendor Plugins -->
<script src="<?= base_url() ?>web/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/dropzone.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/jquery-validation.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/raphael/raphael.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/morris.js/morris.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/plugins/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/js/global/integration/plugins/sweetalert2.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="<?= base_url() ?>web/js/scripts.bundle.js" type="text/javascript"></script>

<!--begin:: Vendor Plugins for custom pages -->
<script src="<?= base_url() ?>web/plugins/custom/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/@fullcalendar/core/main.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/@fullcalendar/daygrid/main.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/@fullcalendar/google-calendar/main.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/@fullcalendar/interaction/main.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/@fullcalendar/list/main.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/@fullcalendar/timegrid/main.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/flot/dist/es5/jquery.flot.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/flot/source/jquery.flot.resize.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/flot/source/jquery.flot.categories.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/flot/source/jquery.flot.pie.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/flot/source/jquery.flot.stack.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/flot/source/jquery.flot.crosshair.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/flot/source/jquery.flot.axislabels.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/js/global/integration/plugins/datatables.init.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-buttons/js/buttons.colVis.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-buttons/js/buttons.flash.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-buttons/js/buttons.html5.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-buttons/js/buttons.print.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/datatables.net-select/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jqvmap/dist/jquery.vmap.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>
<!--end:: Vendor Plugins for custom pages -->
<script src="<?= base_url() ?>web/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--begin::Page Scripts(used by this page) -->
<script src="<?= base_url() ?>web/js/pages/dashboard.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/js/pages/crud/forms/widgets/summernote.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/js/pages/custom/wizard/wizard-4.js" type="text/javascript"></script>
<script src="<?= base_url() ?>web/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>


<!-- <script src="<?= base_url(); ?>web/chartjs/Chart.bundle.js" type="text/javascript"></script> -->

<script type="text/javascript">
    "use strict";

    var KTDatatablesDataSourceHtml = function() {

        var initTable1 = function() {
            var table = $('.kt_table_1').DataTable({
                responsive: true,
                columnDefs: [{
                        orderable: true,
                    },

                ],
                pageSize: 5,
            });
        };

        return {

            //main function to initiate the module
            init: function() {
                initTable1();
            },

        };

    }();

    jQuery(document).ready(function() {
        KTDatatablesDataSourceHtml.init();
        $(".kt_sweetalert_demo_9").click(function(e) {
            var $this = $(this);
            var id = $this.data('id');
            var name = $this.data('name');
            swal.fire({
                title: "Are you sure?",
                text: "To Approve a Tour Guide " + name + "!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, Aprrove it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: 'https://app.worldfoodsafari.co/Administrator/Master_Act/ApproveTour/' + id,
                        dataType: 'json',
                        async: false,
                        type: 'put',
                        processData: false,
                        contentType: false,

                        success: function(response) {

                            swal.fire("Approved!", "Tour guide Successfully Approved.", "success")
                            location.reload()
                        },
                        error: function(data) {


                            swal.fire("Cancelled", "Failed Tour guide Approved :)", "error")
                        }
                    });
                } else {
                    swal.fire("Cancelled", "Failed Tour guide Approved :)", "error")
                }
            })
        })


        $(document).on('click', '.show_modal_image', function(e) {
            e.preventDefault();
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $(".imagemodal").modal('show');

        });
        $(document).on('click', '.close', function(e) {
            e.preventDefault();
            $('.imagemodal').modal('hide');
        });

        $(document).off('click', '.edit-data')
        $(document).on('click', '.edit-data', function(event) {
            event.preventDefault();
            var $this = $(this);
            var id = $this.data('id');

            $(".modal-edit-announcement").modal('show');
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>Administrator/M_Message/edit_announcement_data/" + id,
                cache: false,
                beforeSend: function() {
                    $("#showmodal").html("<div align='center'><img  width='80' height=80'   src='http://adm.t4478.xyz/web/images/logo/loading.gif' /></div>");
                },
                success: function(msg) {
                    $("#showmodal").html(msg);
                }
            });

        })

    });
    $('.select2bali').select2({
        placeholder: "Select Data"
    });

    var KTBootstrapMarkdown = function() {
        // Private functions
        var demos = function() {

        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function() {
        KTBootstrapMarkdown.init();
    });
</script>

<!--end::Page Scripts -->
</body>

<!-- end::Body -->

</html>