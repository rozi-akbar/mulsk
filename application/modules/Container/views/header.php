<!DOCTYPE html>
<html lang="en">
<?php
if ($this->session->userdata('isLogin') == '' || empty($this->session->userdata('isLogin'))) {
    redirect(site_url('Administrator/Login/LoginPage'));
}
?>
<!-- begin::Head -->

<head>
    <base href="../../">
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="<?= base_url() ?>web/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?= base_url() ?>web/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--begin::Layout Skins(used by all pages) -->
    <link href="<?= base_url() ?>web/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />

    <!-- datatable -->
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>web/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- ============================= CHARTS CSS ============================================== -->

    <!-- <script type="text/javascript" src="<?= base_url(); ?>web/chartjs/Chart.js"></script> -->

    <!-- ============================= END CHARTS CSS ========================================== -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/svg/favicon_mulsk.svg" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="#">
                <img alt="Logo" src="<?= base_url() ?>web/media/logos/logo-light.png" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->

            <!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand" style="background:#F5A913;">
                    <div class="kt-aside__brand-logo">
                        <a href="<?= base_url() ?>Administrator/Master">
                            <img alt="Logo" src="<?= base_url() ?>assets/images/svg/mulsk2.svg" width="90" height="90" />
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">


                        <!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
                    </div>
                </div>

                <!-- end:: Aside -->

                <!-- begin:: Aside Menu -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item <?= $this->uri->segment(1) == '' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                                <a href="<?= base_url() ?>Administrator/Dashboard" class="kt-menu__link">
                                    <i class="kt-menu__link-icon flaticon2-analytics"></i>
                                    <span class="kt-menu__link-text">Dashboard </span>
                                </a>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Mulsk Bloger</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <li class="kt-menu__item <?= $this->uri->segment(1) == '' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                                <a href="<?= base_url() ?>BlogAdmin/Blog/DataBlog" class="kt-menu__link">
                                    <i class="kt-menu__link-icon fa fa-file-invoice"></i>
                                    <span class="kt-menu__link-text">Create Blog </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- end:: Aside Menu -->
            </div>

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " style="background-color: #F5A913;">


                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

                        </div>
                    </div>

                    <!-- end:: Header Menu -->

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">

                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile" style="color:white">Hi, <?= $this->session->userdata('nama_user') ?></span>
                                    <img class="kt-hidden" alt="Pic" src="<?= base_url() ?>web/media/users/300_25.jpg" />
                                </div>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?= base_url() ?>web/media/misc/bg-1.jpg)">
                                    <div class="kt-user-card__avatar">
                                        <img class="kt-hidden" alt="Pic" src="<?= base_url() ?>web/media/users/300_25.jpg" />

                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success" style="font-size:17px"><?= strtoupper(substr($this->session->userdata('nama_user'), 0, 1)); ?></span>
                                    </div>
                                    <div class="kt-user-card__name">
                                        <?= $this->session->userdata('nama_user') ?>
                                    </div>
                                    <div class="kt-user-card__badge">
                                        <span class="btn btn-success btn-sm btn-bold btn-font-md">Notifikasi</span>
                                    </div>
                                </div>

                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <a href="custom/apps/user/profile-1/personal-information.html" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Profile
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Account settings and more
                                            </div>
                                        </div>
                                    </a>
                                    <a href="custom/apps/user/profile-2.html" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-rocket-1 kt-font-danger"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Activities
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Logs and notifications
                                            </div>
                                        </div>
                                    </a>
                                    <a href="custom/apps/user/profile-3.html" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-hourglass kt-font-brand"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Notifation
                                            </div>
                                            <div class="kt-notification__item-time">
                                                latest Notification
                                            </div>
                                        </div>
                                    </a>

                                    <div class="kt-notification__custom kt-space-between">
                                        <a href="<?= base_url() ?>Administrator/Login/logout" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                                    </div>
                                </div>

                                <!--end: Navigation -->
                            </div>
                        </div>

                        <!--end: User Bar -->
                    </div>

                    <!-- end:: Header Topbar -->
                </div>