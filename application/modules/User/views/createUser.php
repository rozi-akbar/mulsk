<?php
if ($action == "edit") {
    $idUser     = $data_user['id'];
    $nama       = $data_user['name'];
    $username   = $data_user['username'];
    $pass       = $data_user['password'];
    $level      = $data_user['level'];
    $active     = $data_user['active'];

    $iconButton = "refresh";
    $valueButton = "Update Data";
    $actionButton = "Update/" . $idUser . "";
} else {
    $nama           = "";
    $username       = "";
    $pass           = "";
    $level          = "";
    $active         = "";
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
                                Create User Data
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form class="kt-form" method="post" action="<?= base_url() ?>User/M_User_Act/CreateUser/<?= $actionButton ?>">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="color: #00b26a;">Nama </span></label>
                                    <input type="text" class="form-control" placeholder="Nama" name="cNama" id="cNama" value="<?= $nama ?>" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="color: #00b26a;">Username <span id="result_username"></span></label>
                                    <input type="text" class="form-control" placeholder="Username" name="cUsername" id="cUsername" onchange="cek_username()" value="<?= $username ?>" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="color: #00b26a;">Password : <span id="result_check_kode"></span></label>
                                    <input type="password" class="form-control" placeholder="Password" name="cPassword" id="cPassword" />
                                    <span class="text-muted"> Jika ingin ganti password, langsung isi form input diatas </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="color: #00b26a;">Level</label>
                                    <select name="cLevel" id="cLevel" class="form-control comboBox">
                                        <option value="">PILIH STATUS</option>
                                        <?php
                                        foreach ($data_level as $vaLevel) {
                                        ?>
                                            <option value="<?= $vaLevel['id'] ?>" <?php if ($vaLevel['id'] == $level) { ?> selected <?php } ?>>
                                                <?= $vaLevel['nama_level'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Activate User</label>
                                    <?php
                                    if ($active == 1) {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    }
                                    ?>
                                    <input <?= $checked ?> data-switch="true" data-ktwizard-state="1" type="checkbox" name="active" data-on-color="success" data-off-color="warning">
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data_user_table as $key => $vaUser) {
                                    // if ($action == "edit") {
                                    //     $url_edit = "data_user/edit/";
                                    //     $url_delete = "data_user/Delete/";
                                    // } else {
                                    //     $url_edit = "" . base_url() . "msslim/Master/data_user/edit/";
                                    //     $url_delete = "" . base_url() . "msslim/Master_Act/data_user/Delete/";
                                    // }
                                ?>
                                    <tr>
                                        <td><?= ++$no ?></t>
                                        <td><?= $vaUser['name'] ?></td>
                                        <td><?= $vaUser['username'] ?></td>
                                        <td><?= $vaUser['nama_level'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= base_url('User/M_User/CreateUser/edit/' . $vaUser['id']) ?>" class="btn btn-success btn-icon" title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="<?= base_url('User/M_User_Act/CreateUser/Delete/' . $vaUser['id']) ?>" class="btn btn-danger btn-icon" title="Delete Data">
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
<script type="text/javascript">
    function cek_username() {
        var username = document.getElementById("cUsername").value;
        if (username == "") {
            document.getElementById("save").disabled = false;
            document.getElementById("result_username").style.display = "none";
            document.getElementById("cUsername").value = "";
        } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                document.getElementById("result_username").innerHTML =
                    '<span style="color: #000; text-transform: none; font-size: 12px;"> cek data di sistem ... </span>';
                document.getElementById("save").disabled = true;
                if (this.readyState == 4 && this.status == 200) {

                    var hasil = this.responseText;

                    if (hasil == "Not Valid") {

                        document.getElementById("result_username").innerHTML =
                            '<span style="color:red; text-transform: none; font-size: 12px;"> Username Terpakai </span>';
                        document.getElementById("cUsername").value = username;
                    } else {
                        document.getElementById("result_username").innerHTML =
                            '<span style="color:#00b26a; text-transform: none; font-size: 12px;"> Username Dapat Digunakan </span>';
                        document.getElementById("save").disabled = false;
                    }
                }
            };
            xhttp.open("POST", "<?= site_url('User/M_User/check_username') ?>", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("username=" + username);
        }
    }
</script>