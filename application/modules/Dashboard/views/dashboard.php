<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="card-body" style="font-size: 12px;">
                        <?php
                        if ($this->session->userdata('level_seller_mulsk') == 2) {
                        ?>
                            <a href="<?= site_url() ?>Order/Create_Order" class="btn btn-large btn-success"><i class="fa fa-shopping-basket"></i> BUAT PESANAN</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>