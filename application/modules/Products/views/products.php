<style>
    .post-author {
        font-size: 12px;
    }

    .everything_you {
        font-size: 36px;
        font-weight: 700;
        line-height: 46.87px;
    }

    @media only screen and (max-width: 600px) {
        .everything_you {
            font-size: 19px;
            line-height: 35px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $('.js_add_qv').click(function(e) {
            // body.on("click", ".js_add_qv , .js__qs", function(e) {
            e.preventDefault();
            e.stopPropagation();
            let $this = $(this),
                delay = 200;
            $this.addClass("loading");
            if ($.magnificPopup.instance.isOpen) {
                $.magnificPopup.close();
                delay = $.magnificPopup.instance.st.removalDelay + 10;
            }
            setTimeout(function() {
                if ($this.hasClass("js_giftset")) {
                    window.location = '<?= base_url() ?>Products/luxurygiftset';
                } else if ($this.hasClass("js_scrunchie")) {
                    window.location = '<?= base_url() ?>Products/mulberrysilkscrunchie';
                } else if ($this.hasClass("js_facemask")) {
                    window.location = '<?= base_url() ?>Products/mulberrysilkfacemask';
                } else if ($this.hasClass("js_pillowcase")) {
                    window.location = '<?= base_url() ?>Products/mulberrysilkpillowcase';
                }
            }, delay);
        });
    });
</script>
<div id="nt_content">

    <!--hero banner-->
    <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
            <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= base_url() ?>assets/images/products-page-banner.png"></div>
            <div class="container pr z_100">
                <h1 class="mb__5 cw">PRODUCTS</h1>
            </div>
        </div>
    </div>
    <!--end hero banner-->

    <!--main content-->
    <div class="container container_cat cat_default mt__10 mb__20">
        <div class="row nt_single_blog">
            <div class="col-lg-12 col-xs-12">
                <div class="cat_toolbar row fl_center al_center mt__30">
                    <div class="col-lg-6 cb col-12">
                        <!-- <span class="everything_you">Everything you need to know about Mulsk!</span> -->
                    </div>
                    <div class="cat_sortby cat_sortby_js col-lg-6 col-12 tr kalles_dropdown kalles_dropdown_container">
                        <a class="in_flex fl_between al_center sortby_pick kalles_dropDown_label" href="#">
                            <span class="lbl-title sr_txt dn">Price, Low to High</span>
                            <span class="lbl-title sr_txt_mb">Sort by</span>
                            <i class="ml__5 mr__5 facl facl-angle-down"></i>
                        </a>
                        <div class="nt_sortby dn">
                            <svg class="ic_triangle_svg" viewBox="0 0 20 9" role="presentation">
                                <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                            </svg>
                            <div class="h3 mg__0 tc cd tu ls__2 dn_lg db">Sort by<i class="pegk pe-7s-close fs__50 ml__5"></i>
                            </div>
                            <div class="nt_ajaxsortby wrap_sortby kalles_dropdown_options">
                                <a data-label="Alphabetically, A-Z" class="kalles_dropdown_option truncate" href="#">Alphabetically, A-Z</a>
                                <a data-label="Alphabetically, Z-A" class="kalles_dropdown_option truncate" href="#">Alphabetically, Z-A</a>
                                <a data-label="Price, Low to High" class="kalles_dropdown_option truncate" href="#">Price, Low to High</a>
                                <a data-label="Price, High to Low" class="kalles_dropdown_option truncate" href="#">Price, High to Low</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="kalles-section nt_section type_isotope">

                    <!--articles-->
                    <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">

                        <?php
                        foreach ($dataMaster as $key => $vaData) {
                        ?>
                            <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                <div class="product-inner pr">
                                    <div class="product-image position-relative oh lazyload">

                                        <a class="d-block" href="<?= base_url() ?>Products/detailProduct/<?= $vaData['id'] ?>">
                                            <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() . $vaData['image'] ?>"></div>
                                        </a>
                                        <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                            <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() . $vaData['image'] ?>"></div>
                                        </div>
                                        <div class="hover_button op__0 tc pa flex column ts__03">
                                            <a class="pr nt_add_qv js_add_qv js_pillowcase cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="<?= base_url() ?>Products/detailProduct/<?= $vaData['id'] ?>">
                                                <span class="tt_txt">Click to View</span>
                                                <i class="iccl iccl-eye"></i>
                                                <span>Click to View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info mt__15">
                                        <h3 class="product-title position-relative fs__14 mg__0 fwm">
                                            <a class="cd chp" href="<?= base_url() ?>Products/detailProduct/<?= $vaData['id'] ?>"><b><?= $vaData['nama_product'] ?></b></a>
                                        </h3>
                                        <span class="price dib mb__5"><?= $vaData['price'] ?></span>
                                        <br />
                                        <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                            <?php
                                            foreach ($vColor as $keyColor => $vaDataSelector) {
                                                if ($vaData['product_id'] == $vaDataSelector['m_product_id']) {
                                            ?>
                                                    <span data-bgset="<?= base_url() . $vaDataSelector['url_image'] ?>" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right">
                                                        <span class="tt_txt"><?= $vaDataSelector['color_name'] ?></span>
                                                        <span class="swatch__value" style="background-color: <?= $vaDataSelector['color'] ?>;"></span>
                                                    </span>
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
                    <br><br><br>
                    <!--end articles-->

                    <!--navigation-->
                    <div class="products-footer tc">
                        <nav class="nt-pagination w__100 tc paginate_ajax">
                        </nav>
                    </div>
                    <!--end navigation-->
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
    <!--end main content-->

</div>