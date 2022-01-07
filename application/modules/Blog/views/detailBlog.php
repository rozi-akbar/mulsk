<style>
    .table-bordered {
        border: none;
    }

    img {
        margin: 0% 2%;
    }
</style>
<div id="nt_content" style="margin-top: 2%;">

    <!--hero banner-->
    <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
            <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= base_url() ?><?= $vBlog['banner_blog'] ?>"></div>
            <div class="container pr z_100">
                <h1 class="mb__5 cw"><?= $vBlog['title'] ?></h1>
                <p class="mg__0"><?= substr($vBlog['posted_at'], 0, 10) ?></p>
            </div>
        </div>
    </div>

    <!--end hero banner-->
    <?php
    if (empty($dataMaster)) {
    ?>
        <!--main content-->
        <div class="container container_cat cat_default mt__60 mb__20">
            <div class="row nt_single_blog">
                <div class="col-lg-12 col-xs-12">
                    <div class="kalles-section nt_section type_isotope">
                        <div class="cb">
                            <p> <?= $vBlog['content'] ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <!--main content-->
        <div class="container container_cat cat_default mt__60 mb__20">
            <div class="row nt_single_blog">
                <div class="col-lg-12 col-xs-12">
                    <div class="kalles-section nt_section type_isotope">
                        <div class="cb">
                            <p> <?= $vBlog['content'] ?> </p>
                        </div>
                        <div class="wrap_title des_title_2">
                            <h3 class="section-title tc position-relative flex fl_center al_center fs__24 title_2">
                                <span class="mr__10 ml__10">SHOP THE PRODUCTS</span>
                            </h3>
                            <span class="dn tt_divider">
                                <span></span>
                                <i class="dn clprfalse title_2 la-gem"></i>
                                <span></span>
                            </span>
                        </div>
                        <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">

                            <?php
                            foreach ($dataMaster as $key => $rowData) {
                            ?>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image position-relative oh lazyload">

                                            <a class="d-block" href="<?= site_url('Products/detailProduct/' . $rowData['id']) ?>">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() . $rowData['image'] ?>"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() . $rowData['image'] ?>"></div>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title position-relative fs__14 mg__0 fwm">
                                                <a class="cd chp" href="<?= site_url('Products/detailProduct/' . $rowData['id']) ?>"><?= $rowData['nama_product'] ?></a>
                                            </h3>
                                            <span class="price dib mb__5">
                                            <?= "Rp " . number_format($rowData['price'], 2, ',', '.'); ?>
                                            </span>
                                            <br />
                                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                                <?php
                                                foreach ($vColor as $keyColor => $vaDataSelector) {
                                                    if ($rowData['product_id'] == $vaDataSelector['m_product_id']) {
                                                ?>
                                                        <span data-bgset="<?= base_url() . $vaDataSelector['url_image'] ?>" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt"><?= $vaDataSelector['color_name'] ?></span><span class="swatch__value" style="background-color: <?= $vaDataSelector['color'] ?>;"></span></span>
                                                <?php
                                                    } else {
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end main content-->
    <?php
    }
    ?>
</div>