<?php
foreach ($dataMaster as $vaData) {
    $id                 = $vaData['id'];
    $productName        = $vaData['nama_product'];
    $productId          = $vaData['product_id'];
    $price              = $vaData['price'];
    $url_image          = $vaData['image'];
    $url_imageBenefits  = $vaData['benefits_image'];
    $publish            = $vaData['publish'];
    $deskripsi          = $vaData['deskripsi'];
    $benefits           = $vaData['benefits'];
    $wash_care          = $vaData['wash_care'];
}
?>
<style>
    table {
        border: 0;
    }

    td {
        text-align: center;
        border: 0;
    }
</style>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/single-masonry-theme.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/single-product.css">

<div id="nt_content">
    <div class="sp-single sp-single-1 des_pr_layout_1 mb__60">

        <!-- breadcrumb -->
        <div class="bgbl pt__20 pb__20 lh__1">
            <div class="container">
                <div class="row al_center">
                    <div class="col">
                        <nav class="sp-breadcrumb">
                            <a href="<?= site_url('Home') ?>">Home</a><i class="facl facl-angle-right"></i><a href="<?= site_url('Products') ?>">Products</a><i class="facl facl-angle-right"></i><?= $productName ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->

        <div class="container container_cat cat_default">
            <div class="row product mt__40">
                <div class="col-md-12 col-12 thumb_left">
                    <div class="row mb__50 pr_sticky_content">

                        <!-- product thumbnails -->
                        <div class="col-md-6 col-12 pr product-images img_action_zoom pr_sticky_img kalles_product_thumnb_slide">
                            <div class="row theiaStickySidebar">
                                <div class="col-12 col-lg col_thumb">
                                    <div class="p-thumb p-thumb_ppr images sp-pr-gallery equal_nt nt_contain ratio_imgtrue position_8 nt_slider pr_carousel" data-flickity='{"initialIndex": ".media_id_001","fade":true,"draggable":">1","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 6,"pageDots": false,"rightToLeft": false }'>

                                        <?php
                                        // print_r($product_gallery);
                                        $no = 0;
                                        foreach ($product_gallery as $vaGall) {
                                        ?>
                                            <div class="img_ptw p_ptw p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__127_66 media_id_001" data-mdid="001" data-height="1440" data-width="1128" data-ratio="0.7833333333333333" data-mdtype="image" data-src="<?= base_url() ?><?= $vaGall['url_image'] ?>" data-bgset="<?= base_url() ?><?= $vaGall['url_image'] ?>" data-cap="<?= $productName ?> - color gold"></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="p_group_btns pa flex">
                                        <button class="br__40 tc flex al_center fl_center show_btn_pr_gallery ttip_nt tooltip_top_left">
                                            <i class="las la-expand-arrows-alt"></i><span class="tt_txt">Click to enlarge</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col_nav nav_medium t4_show">
                                    <div class="p-nav ratio_imgtrue row equal_nt nt_cover position_8 nt_slider pr_carousel" data-flickityjs='{"initialIndex": ".media_id_001","cellSelector": ".n-item:not(.is_varhide)","cellAlign": "left","asNavFor": ".p-thumb","wrapAround": true,"draggable": ">1","autoPlay": 0,"prevNextButtons": 0,"percentPosition": 1,"imagesLoaded": 0,"pageDots": 0,"groupCells": 3,"rightToLeft": false,"contain":  1,"freeScroll": 0}'></div>
                                    <button type="button" aria-label="Previous" class="btn_pnav_prev pe_none">
                                        <i class="las la-angle-up"></i>
                                    </button>
                                    <button type="button" aria-label="Next" class="btn_pnav_next pe_none">
                                        <i class="las la-angle-down"></i>
                                    </button>
                                </div>
                                <div class="dt_img_zoom pa t__0 r__0 dib"></div>
                            </div>
                        </div>
                        <!-- end product thumbnails -->

                        <!-- product detail -->
                        <div class="col-md-6 col-12 product-infors pr_sticky_su">
                            <div class="theiaStickySidebar">
                                <div class="kalles-section-pr_summary kalles-section summary entry-summary mt__30">
                                    <h1 class="product_title entry-title fs__16"><?= $productName ?></h1>
                                    <div class="flex wrap fl_between al_center price-review">
                                        <p class="price_range" id="price_ppr">
                                            <span class="price dib mb__5">
                                                <?= "Rp " . number_format($price, 2, ',', '.'); ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="pr_short_des">
                                        <!-- <p class="mg__0">Say Goodbye To Dull Skin and Bed Head With Mulsk, 100% Mulberry Silk Pillow Case!</p><br>
                                        <p class="mg__0"><b>Bahan:</b> 100% mulberry silk, top grade 6A
                                            <br><b>Ketebalan:</b> 22 momme
                                            <br><b>Ukuran:</b> 52 cm x 72 cm
                                        </p> -->
                                        <?= $deskripsi ?>
                                    </div>
                                    <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
                                        <div id="callBackVariant_ppr">
                                            <div class="variations mb__40 style__circle size_medium style_color des_color_1">
                                                <div class="swatch is-color kalles_swatch_js">
                                                    <h4 class="swatch__title">Color:
                                                        <span class="nt_name_current user_choose_js">
                                                            <?= $color_image_selector[0]['color_name']; ?>
                                                        </span>
                                                    </h4>
                                                    <ul class="swatches-select swatch__list_pr d-flex">
                                                        <?php
                                                        $no = 0;
                                                        foreach ($product_gallery as $rowGall) {
                                                            $urutan = $no;
                                                            foreach ($color_image_selector as $key => $vaCIS) {
                                                                if ($rowGall['id'] == $vaCIS['id']) {
                                                        ?>
                                                                    <li class="ttip_nt tooltip_top nt-swatch swatch_pr_item" data-escape="<?= $vaCIS['color_name'] ?>">
                                                                        <span class="tt_txt"><?= $vaCIS['color_name'] ?></span><span class="swatch__value_pr pr lazyload" style="background-color:<?= $vaCIS['color'] ?>;" onclick="colorSelector(<?= $urutan ?>)"></span>
                                                                    </li>
                                                        <?php
                                                                } else {
                                                                }
                                                            }
                                                            $no++;
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    // Program to display URL of current page. 

                                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                                        $link = "https";
                                    else
                                        $link = "http";

                                    $link .= "://";
                                    $link .= $_SERVER['HTTP_HOST'];
                                    $link .= $_SERVER['REQUEST_URI'];

                                    ?>
                                    <div class="social-share tc">
                                        <div class="at-share-btn-elements kalles-social-media d-block text-left fs__0 lh__1">
                                            <a href="http://www.facebook.com/sharer.php?u=<?= $link ?>" target="_blank" class="at-icon-wrapper at-share-btn at-svc-facebook bg-white kalles-social-media__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-facebook">
                                                    <g>
                                                        <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="https://twitter.com/share?url=<?= $link ?>" target="_blank" class="at-icon-wrapper at-share-btn at-svc-twitter bg-white kalles-social-media__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-twitter">
                                                    <g>
                                                        <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="http://pinterest.com/pinthis?url=<?= $link ?>" target="_blank" class="at-icon-wrapper at-share-btn at-svc-pinterest_share bg-white kalles-social-media__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-pinterest_share">
                                                    <g>
                                                        <path d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <a class="btn btn-warning" style="width: 215px; height: 40px; border-radius: 30px;padding:0.65em;font-weight:700;font-size:14px" href="https://wa.me/+6282232481689?text=Hallo%2C+saya+mau+order+ya+kak" target="_blank" role="button">ORDER VIA WHATSAPP</a>
                                </div>
                            </div>
                        </div>
                        <!-- end product detail -->

                    </div>
                </div>
            </div>
        </div>

        <!-- description and review -->
        <div id="wrap_des_pr">
            <div class="container container_des">
                <div class="kalles-section-pr_description kalles-section kalles-tabs sp-tabs nt_section">

                    <!-- tab buttons -->
                    <ul class="ul_none ul_tabs is-flex fl_center fs__16 des_mb_2 des_style_1">
                        <li class="tab_title_block active">
                            <a class="db cg truncate pr" href="#tab_product_description">Benefits</a>
                        </li>
                        <li class="tab_title_block">
                            <a class="db cg truncate pr" href="#tab_wash_and_care">Wash &amp; Care</a>
                        </li>
                    </ul>
                    <!-- end tab buttons -->

                    <!-- tab contents -->
                    <div class="panel entry-content sp-tab des_mb_2 des_style_1 active" id="tab_product_description">
                        <div class="js_ck_view"></div>
                        <div class="heading bgbl dn">
                            <a class="tab-heading flex al_center fl_between pr cd chp fwm" href="#tab_product_description"><span class="txt_h_tab">Benefits</span><span class="nav_link_icon ml__5"></span></a>
                        </div>
                        <div class="sp-tab-content cb">
                            <?= $benefits ?>

                            <div class="row al_center fl_center bgbl_ pt__100 pb__35">
                                <div class="col-12 col-md-3 tc tr_md">
                                    <?php

                                    $patch = count($product_icon) / 2;
                                    $no = 0;
                                    foreach ($product_icon as $vaIcon) {
                                        if (++$no <= round($patch)) {
                                    ?>
                                            <div class="row fl_center al_center no-gutters mb__60">
                                                <div class="col-12 col-md-auto cl_depr_img ml__10 mr__10 order-md-4">
                                                    <img width="50" alt="rain" class="lazyload" data-src="<?= base_url() ?><?= $vaIcon['url_product_icon'] ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                                </div>
                                                <div class="col-12 col-md">
                                                    <?= $vaIcon['description_product_icon'] ?>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        }
                                        ?>

                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-12 dn_md mt__40"></div>
                                <div class="col-12 col-md-6">
                                    <img class="lazyload w__100 db" data-srcset="<?= base_url() ?><?= $url_imageBenefits ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
                                </div>
                                <div class="col-12 dn_md mt__40"></div>
                                <div class="col-12 col-md-3 tc tl_md">

                                    <?php

                                    $patch2 = count($product_icon) / 2;
                                    $no2 = 0;
                                    foreach ($product_icon as $vaIcon2) {
                                        if (++$no2 > round($patch2)) {
                                    ?>
                                            <div class="row fl_center al_center no-gutters mb__60">
                                                <div class="col-12 col-md-auto cl_depr_img ml__10 mr__10">
                                                    <img width="50" alt="lead" data-src="<?= base_url() ?><?= $vaIcon2['url_product_icon'] ?>" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                                </div>
                                                <div class="col-12 col-md">
                                                    <?= $vaIcon2['description_product_icon'] ?>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        }
                                        ?>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel entry-content sp-tab des_mb_2 des_style_1 dn" id="tab_wash_and_care">
                        <div class="js_ck_view"></div>
                        <div class="heading bgbl dn">
                            <a class="tab-heading flex al_center fl_between pr cd chp fwm" href="#tab_wash_and_care"><span class="txt_h_tab">Wash &amp; Care</span><span class="nav_link_icon ml__5"></span></a>
                        </div>
                        <div class="sp-tab-content">
                            <div class="row fl_wrap fl_wrap_md oah use_border_false fl_center">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="nt_shipping nt_icon_deafult tl no-gutters al_center_" style="text-align: center;">
                                        <div class="icon medium csi">
                                            <img src="<?= base_url() ?>assets/images/svg/silk-wash.svg" width="60px">
                                        </div>
                                        <div class="content">
                                            Use a Gentle Silk Wash and don't mix it with other harsh chemicals
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="nt_shipping nt_icon_deafult tlno-gutters al_center_" style="text-align: center;">
                                        <div class="icon medium csi">
                                            <img src="<?= base_url() ?>assets/images/svg/silk-spray.svg" width="60px">
                                        </div>
                                        <div class="content">
                                            Use Silk Spray in the air to create a calming environment for sleeping
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <h3 class="text-center"><b><u>Some Precautions, Pay attention to your 100% Mulberry Silk</u></b></h3>
                            <div class="fl_wrap fl_wrap_md oah use_border_false fl_center text-center">
                                <table style="width: 600px; margin: auto;">
                                    <tr>
                                        <td>
                                            <h3 class="text-center"><b>Do's</b></h3>
                                        </td>
                                        <td>
                                            <h3 class="text-center"><b>Dont's</b></h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/pillow-icon.svg" width="60px"><br>
                                            <span>Cek label perawatan pada sisi dalam Mulsk Pillowcase</span>
                                        </td>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/detergen-icon.svg" width="60px"><br>
                                            <span>Jangan gunakan pemutih pakaian atau pelembut</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/pisahkan-icon.svg" width="60px"><br>
                                            <span>Pisahkan dengan bahan yang lain ketika mencuci</span>
                                        </td>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/matahari-icon.svg" width="60px"><br>
                                            <span>Hindari terkena matahari secara langsung ketika menjemur</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/ph-icon.svg" width="60px"><br>
                                            <span>Gunakan detergent khusus sutra dengan pH netral</span>
                                        </td>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/machine-icon.svg" width="60px"><br>
                                            <span>Jangan menggunakan mesin cuci ataupun dikucek berlebih</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/setrika-icon.svg" width="60px"><br>
                                            <span>Setrika dengan suhu rendah khusus untuk sutra</span>
                                        </td>
                                        <td>
                                            <img src="<?= base_url() ?>assets/images/svg/dodont/squeeze-icon.svg" width="60px"><br>
                                            <span>Jangan memeras kain ketika proses mengeringkan</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div>
                                <ul>
                                    <li style="text-align: justify;"><b>Pisahkan Mulsk Pillowcase dengan bahan yang lain</b><br></li>
                                </ul>
                                <p style="text-align: justify;">Hal ini dilakukan untuk menghindari kain 100% mulberry silk terkena luntur dari bahan lain.</p>
                                <ul>
                                    <li style="text-align: justify;"><b>Mencuci secara manual dan tidak disikat atau kucek berlebih</b></li>
                                </ul>
                                <p style="text-align: justify;">Guna menjaga serat sutra agar tidak rusak dan kustu, disarankan untuk dicuci secara manual menggunakan air bersih dengan suhu netral, jangan menggunakan air sumur</p>
                                <ul>
                                    <li style="text-align: justify;"><b>Cuci dengan Silky Detergent, detergent tanpa softener khusus untuk kain sutra dengan pH netral</b></li>
                                </ul>
                                <p style="text-align: justify;">Menambahkan beberapa 3-5 tetes detergent ke dalam baskom/bak berisi air, kemudian aduk hingga merata dengan tangan. Masukkan Mulsk ke dalam air dan tekan dengan tangan agar terendam, diamkan selama 1-2 menit.</p>
                                <ul>
                                    <li style="text-align: justify;"><b>Cuci dengan lembut dan perlahan agar tidak merusak kain sutra</b></li>
                                </ul>
                                <p style="text-align: justify;">Angkat Mulsk lalu celupkan perlahan kedalam air beberapa kali, apabila terdapat noda usap dengan hari secara lembut pada bagian noda tersebut secara perlahan. Angkat Mulsk lalu buang air sabun, gantikan dengan air bersih untuk membilas seluruh permukaan sarung bantal</p>
                                <ul>
                                    <li style="text-align: justify;"><b>Serap kelembabapan dengan handuk</b></li>
                                </ul>
                                <p style="text-align: justify;">Letakkan sarung bantal sutra pada handuk lalu gulung secara perlahan. Jangan memeras handuk yang sudah digulung karena akan dapat merusak sutra</p>
                                <ul>
                                    <li style="text-align: justify;"><b>Proses menjemur dan pengeringan kain sutra</b></li>
                                </ul>
                                <p style="text-align: justify;">Kerangkan dan beri angin-angin di tempat teduh agar produk segera kering. Jangan terkena sinar matahari secara langsung karena dapat merusak kualitas benang sutra</p>
                                <ul>
                                    <li style="text-align: justify;"><b>Proses setrika Mulsk Pillowcase</b></li>
                                </ul>
                                <p style="text-align: justify;">Setrika dengan setelan suhu rendah (khusus untuk sutra), jangan terlalu panas karena suhu panas tinggi dapat membuat sutra berkerut. Saat menyetrika, disarankan dapat melapisi dengan kain katun terlebih dahulu</p>
                            </div>
                        </div>
                    </div>
                    <!-- end tab contents -->
                </div>
            </div>
        </div>
        <!-- end description and review -->
        <br />
        <div class="clearfix">
            <div style="width: 250px; margin: auto;">
                <a class="btn btn-warning" style="width: 250px; height: 50px; border-radius: 100px;padding:0.75em;font-weight:bold" href="<?= site_url('How_to_Buy') ?>" role="button">I want to buy this!</a>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/photoswipe.min.js"></script>
<script src="<?= base_url() ?>assets/js/photoswipe-ui-default.min.js"></script>
<script src="<?= base_url() ?>assets/js/drift.min.js"></script>
<script src="<?= base_url() ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/resize-sensor.min.js"></script>
<script src="<?= base_url() ?>assets/js/theia-sticky-sidebar.min.js"></script>