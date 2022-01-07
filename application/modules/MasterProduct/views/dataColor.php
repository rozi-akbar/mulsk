<?php
if ($action == "edit") {
    $id         = $data_color['id'];
    $colorHex   = $data_color['color'];
    $colorName  = $data_color['color_name'];
    $created_at = $data_color['created_at'];
    $created_by = $data_color['created_by'];
    $update_at  = $data_color['update_at'];
    $update_by  = $data_color['update_by'];

    $iconButton = "refresh";
    $valueButton = "Update Data";
    $actionButton = "Update/" . $id . "";
} else {
    $id             = "";
    $colorName      = "";
    $colorHex       = "";
    $created_at     = "";
    $created_by     = "";
    $update_at      = "";
    $update_by      = "";
    $valueButton    = "Simpan Data";
    $iconButton     = "save";
    $actionButton   = "Insert";
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
            <div class="col-md-4">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Create Master Shade Color
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form class="kt-form" method="post" action="<?= base_url() ?>MasterProduct/M_Product_Act/CreateShadeColor/<?= $actionButton ?>">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php
                                        if ($action == "edit") {
                                        ?>
                                            <label> Shade Color </label>
                                            <input type="color" name="u_color_hex" class="form-control" value="<?= $colorHex ?>" required>

                                            <label> Color Name </label>
                                            <input type="text" name="u_colorName" class="form-control" value="<?= $colorName ?>" required>
                                        <?php
                                        } else {
                                        ?>
                                            <label> Shade Color </label>
                                            <table id="table_field_color" class="table table-bordered">
                                                <thead>
                                                    <th>Color Picker</th>
                                                    <th>Color Name</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="color" name="color_hex[]" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="colorName[]" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="button" class="btn btn-warning btn-sm" id="add_color" name="add_color" value="Add" />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" id="save" class="btn btn-flat btn-primary">
                                        <i class="fa fa-<?= $iconButton ?>"></i> <?= $valueButton ?>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                List Data User
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <table class="table table-striped- table-bordered table-hover table-checkable kt_table_1" id="kt_table_1" style="font-size:13px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Color Hex</th>
                                    <th>Color Name</th>
                                    <th>Created Date</th>
                                    <th>Created By</th>
                                    <th>Update Date</th>
                                    <th>Update By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data_shade_color as $key => $vaColor) {
                                ?>
                                    <tr>
                                        <td><?= ++$no ?></t>
                                        <td><?= $vaColor['color'] ?></td>
                                        <td><?= $vaColor['color_name'] ?></td>
                                        <td><?= $vaColor['created_at'] ?></td>
                                        <td><?= $vaColor['created_by'] ?></td>
                                        <td><?= $vaColor['update_at'] ?></td>
                                        <td><?= $vaColor['update_by'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= base_url('MasterProduct/M_Product/M_ShadeColor/edit/' . $vaColor['id']) ?>" class="btn btn-success btn-icon" title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="<?= base_url('MasterProduct/M_Product_Act/CreateShadeColor/Delete/' . $vaColor['id']) ?>" class="btn btn-danger btn-icon" title="Delete Data">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var html = '<tr><td><input type="color" name="color_hex[]" class="form-control"></td><td><input type="text" name="colorName[]" class="form-control"></td><td> <input type="button" class="btn btn-danger btn-sm" id="remove_color" name="remove_color" value="Remove" /> </td></tr>';
        var max = 10;
        var x = 1;

        $("#add_color").click(function() {
            if (x < max) {
                $("#table_field_color").append(html);
                x++;
            }
        });

        $("#table_field_color").on('click', '#remove_color', function() {
            $(this).closest('tr').remove();
            x--;
        });
    });
</script>