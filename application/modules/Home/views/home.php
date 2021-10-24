<link rel="stylesheet" href="<?= base_url() ?>assets/css/home.css">
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
                }
            }, delay);
        });
    });

    // myFunction();

    // function myFunction() {
    //     if (screen.width > 768) {
    //         var x = 'assets/images/homebanner/banner-1-mulsk.jpg';
    //         alert(screen.width);
    //         $("#banner_home1").attr("data-bgset",x);
    //     } else if(screen.width <= 768){
    //         var x = 'assets/images/homebanner/banner-1-mobile.jpg';
    //         alert(screen.width);
    //         $("#banner_home1").attr("data-bgset",x);
    //     }
    // }
</script>
<div id="nt_content">

    <!-- main slide -->
    <div class="nt_section type_slideshow type_carousel ">
        <div class="slideshow-wrapper nt_full se_height_cus_h nt_first">
            <div class="fade_flick_1 slideshow row no-gutters equal_nt nt_slider js_carousel prev_next_0 btn_owl_1 dot_owl_2 dot_color_1 btn_vi_2" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 5000,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>

                <!-- first slide -->
                <div class="col-12 slideshow__slide">
                    <div class="oh position-relative nt_img_txt bg-black--transparent">
                        <div class="js_full_ht4 img_slider_block kalles-slide-element__pdb-600">
                            <!-- <div id="banner_home1" class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_zoom pa l__0 t__0 r__0 b__0 img_banner1" data-bgset="<?= base_url() ?>assets/images/homebanner/banner-1-mulsk.jpg"></div> -->
                            <div id="banner_home1" class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_zoom pa l__0 t__0 r__0 b__0 img_banner1"></div>
                        </div>
                        <div class="caption-wrap caption-w-1 pe_none z_100 tr_md tl">
                            <div class="pa_txts caption kalles-caption-layout-01 kalles-caption--midle-right">
                                <div class="right_left">
                                    <!-- <h4 class="kalles-caption-layout-01__subtitle mg__0 lh__2 banner-title1_1">Natural premium material, Fibers that come from nature are perfect just the way they are⁣</h4>
                                    <h3 class="kalles-caption-layout-01__title mg__0 lh__1 banner-title1_2">New Innovation<br />for New Experience</h3>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end first slide -->

                <!-- second slide -->
                <div class="col-12 slideshow__slide">
                    <div class="oh position-relative nt_img_txt bg-black--transparent">
                        <div class="js_full_ht4 img_slider_block kalles-slide-element__pdb-600">
                            <!-- <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_tran_ef pa l__0 t__0 r__0 b__0 img_banner2" data-bgset="<?= base_url() ?>assets/images/homebanner/banner-2-mulsk.jpg"></div> -->
                            <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_tran_ef pa l__0 t__0 r__0 b__0 img_banner2"></div>
                        </div>
                        <div class="caption-wrap caption-w-1 pe_none z_100 tl_md tl">
                            <div class="pa_txts caption kalles-caption-layout-01 kalles-caption--midle-left">
                                <div class="left_right">
                                    <!--<h4 class="kalles-caption-layout-01__subtitle mg__0 lh__2 banner-title2_1">Helps your skin and hair retain its natural moisture and hydration, leaving it feeling smoother and softer</h4>
                                    <h3 class="kalles-caption-layout-01__title mg__0 lh__1 banner-title2_2">Maximizes Your<br />Skincare Absorption</h3>
                                    <a class="kalles-caption-layout-01__button kalles-button--square slt4_btn button pe_auto round_false btn_icon_false" href="<?= site_url('Products') ?>">FIND OUT MORE</a>-->
                                </div>
                            </div>
                        </div>
                        <a href="shop.html" class="pa t__0 l__0 b__0 r__0 pe_none"></a>
                    </div>
                </div>
                <!-- end second slide -->

                <!-- third slide -->
                <div class="col-12 slideshow__slide">
                    <div class="oh position-relative nt_img_txt bg-black--transparent">
                        <div class="js_full_ht4 img_slider_block kalles-slide-element__pdb-600">
                            <!-- <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_tran_ef pa l__0 t__0 r__0 b__0 img_banner3" data-bgset="<?= base_url() ?>assets/images/homebanner/banner-3-mulsk.jpg"></div> -->
                            <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_tran_ef pa l__0 t__0 r__0 b__0 img_banner3"></div>
                        </div>
                        <div class=" caption-wrap caption-w-1 pe_none z_100 tl_md tl">
                            <div class="pa_txts caption kalles-caption-layout-01 kalles-caption--midle-left">
                                <div class="left_right">
                                    <!--<h4 class="kalles-caption-layout-01__subtitle mg__0 lh__2 banner-title3_1">100% Mulberry silk material will help you maintain your skin moisturized and hair soft while you sleep</h4>
                                        <h3 class="kalles-caption-layout-01__title mg__0 lh__1 banner-title3_2">Reduce Wrinkles & Face Creases</h3>
                                        <a class="kalles-caption-layout-01__button kalles-button--square slt4_btn button pe_auto round_false btn_icon_false" href="<?= site_url('Products') ?>">FIND OUT MORE</a>-->
                                </div>
                            </div>
                        </div>
                        <a href="shop.html" class="pa t__0 l__0 b__0 r__0 pe_none"></a>
                    </div>
                </div>
                <!-- end third slide -->

            </div>
        </div>
    </div>
    <br>
    <br>
    <!-- end main slide -->

    <!-- begin our product -->
    <div class="nt_section type_featured_collection tp_se_cdt">
        <div class="kalles-otp-01__feature container">
            <div class="wrap_title des_title_2">
                <h3 class="section-title tc position-relative flex fl_center al_center fs__24 title_2">
                    <span class="mr__10 ml__10">OUR PRODUCTS</span>
                </h3>
                <span class="dn tt_divider">
                    <span></span>
                    <i class="dn clprfalse title_2 la-gem"></i>
                    <span></span>
                </span>
            </div>

            <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">
                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                    <div class="product-inner pr">
                        <div class="product-image position-relative oh lazyload">
                            <span class="tc nt_labels pa pe_none cw"></span>
                            <a class="d-block" href="<?= site_url('Products/luxurygiftset') ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() ?>assets/images/products/giftset/Luxury-Gift-Set-gold.jpg"></div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() ?>assets/images/products/giftset/Luxury-Gift-Set-gold.jpg"></div>
                            </div>
                            <div class="hover_button op__0 tc pa flex column ts__03">
                                <a class="pr nt_add_qv js_add_qv js_giftset cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="<?= site_url('Products/luxurygiftset') ?>">
                                    <span class="tt_txt">Click to View</span>
                                    <i class="iccl iccl-eye"></i>
                                    <span>Click to View</span>
                                </a>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title position-relative fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= site_url('Products/luxurygiftset') ?>"><b>Luxury Gift Set</b></a>
                            </h3>
                            <span class="price dib mb__5">Rp 999.000</span>
                            <br />
                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                <span data-bgset="<?= base_url() ?>assets/images/products/giftset/Luxury-Gift-Set-gold.jpg" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt">Gold</span><span class="swatch__value bg_color_gold"></span></span>
                                <span data-bgset="<?= base_url() ?>assets/images/products/giftset/Luxury-Gift-Set-silver.jpg" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt">Silver</span><span class="swatch__value bg_color_siler"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                    <div class="product-inner pr">
                        <div class="product-image position-relative oh lazyload">
                            <span class="tc nt_labels pa pe_none cw"></span>
                            <a class="d-block" href="<?= site_url('Products/mulberrysilkscrunchie') ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() ?>assets/images/products/scrunchie/scrunchie-1.png"></div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() ?>assets/images/products/scrunchie/scrunchie-1.png"></div>
                            </div>
                            <div class="hover_button op__0 tc pa flex column ts__03">
                                <a class="pr nt_add_qv js_add_qv js_scrunchie cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="<?= site_url('Products/mulberrysilkscrunchie') ?>">
                                    <span class="tt_txt">Click to View</span>
                                    <i class="iccl iccl-eye"></i>
                                    <span>Click to View</span>
                                </a>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title position-relative fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= site_url('Products/mulberrysilkscrunchie') ?>"><b>Mulberry Silk Scrunchie</b></a>
                            </h3>
                            <span class="price dib mb__5">Rp 199.000</span>
                            <br />
                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                <span data-bgset="<?= base_url() ?>assets/images/products/scrunchie/scrunchie-2.png" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt">Gold</span><span class="swatch__value bg_color_gold"></span></span>
                                <span data-bgset="<?= base_url() ?>assets/images/products/scrunchie/scrunchie-1.png" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt">Silver</span><span class="swatch__value bg_color_siler"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                    <div class="product-inner pr">
                        <div class="product-image position-relative oh lazyload">
                            <span class="tc nt_labels pa pe_none cw"></span>
                            <a class="d-block" href="<?= site_url('Products/mulberrysilkfacemask') ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() ?>assets/images/products/facemask/facemask-1.jpg"></div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= base_url() ?>assets/images/products/facemask/facemask-1.jpg"></div>
                            </div>
                            <div class="hover_button op__0 tc pa flex column ts__03">
                                <a class="pr nt_add_qv js_add_qv js_facemask cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="<?= site_url('Products/mulberrysilkfacemask') ?>">
                                    <span class="tt_txt">Click to View</span>
                                    <i class="iccl iccl-eye"></i>
                                    <span>Click to View</span>
                                </a>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title position-relative fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= site_url('Products/mulberrysilkfacemask') ?>"><b>Mulberry Silk Face Mask</b></a>
                            </h3>
                            <span class="price dib mb__5">Rp 199.000</span>
                            <br />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end our product -->

    <!--full width banner section-->
    <div class="kalles-section nt_section type_image_text_overlay">
        <div class="kalles-handmade__full-width-banner nt_full txt_shadow_false se_height_cus_h nt_first">
            <div class="row equal_nt">
                <div class="col-12">
                    <div class="nt_img_txt oh pr middle center">
                        <div class="js_full_ht4 lazyload item__position bg_rp_norepeat bg_sz_cover center background-change" data-bgset="<?= base_url() ?>assets/images/how-to-order.jpg"></div>
                        <div class="txt_content pa t__0 l__0 b__0 r__0 caption-w-1 flex column shadow_wrap tl pe_none z__100">
                            <div class="pa pa_txts">
                                <h3 class="mt__0 mg__0 lh__1 content_889">100% Mulberry Silk Pillowcase</h3>
                                <div class="kalles-handmade__full-width-banner__br imtt4_space"></div>
                                <p class="kalles-handmade__full-width-banner__desc content_890">
                                    Mulsk Mulberry Silk Pillow Case telah tersertifikasi oleh OEKO-TEXⓇ Standard 100 yang telah dites dan bergaransi 100% bebas dari bahan berbaya, toksin, dan subtansi yang dapat mengiritasi kulit dan rambut.
                                </p>
                                <a class="imtt4_btn button pe_auto round_true btn_icon_false" href="<?= site_url('How_to_Buy') ?>">How to Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end full width banner section-->

    <!--blog post-->
    <div class="kalles-section kalles-section_type_featured_blog nt_section type_featured_blog type_carousel">
        <div class="container">
            <div class="wrap_title mb__30 des_title_2">
                <h3 class="section-title tc pr flex fl_center al_center fs__24 title_2">
                    <span class="mr__10 ml__10">LATEST FROM BLOG</span>
                </h3>
                <span class="dn tt_divider">
                    <span></span><i class="dn clprfalse title_2 la-pencil-alt"></i><span></span>
                </span>
            </div>
            <div class="articles art_des1 nt_products_holder row nt_cover ratio4_3 position_8 equal_nt js_carousel nt_slider prev_next_1 btn_owl_1 dot_owl_1 dot_color_1 btn_vi_1" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                    <a class="mb__15 db pr oh" href="<?= site_url('Blog/bg1506202103') ?>">
                        <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/img-blog6.jpg"></div>
                    </a>
                    <div class="post-info mb__10">
                        <h4 class="mg__0 fs__16 mb__5 ls__0">
                            <a class="cd chp open" href="<?= site_url('Blog/bg1506202103') ?>">Benarkah Sarung Bantal Mulberry Silk Bisa Cegah Jerawat di Wajah?</a>
                        </h4>
                        <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">13 Oktober 2021</time></span></span>
                    </div>
                    <div class="post-content">Sarung bantal Anda memang terlihat bersih, tetapi bakteri yang telah menempel dapat kembali ke wajah.</div>
                </article>
                <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                    <a class="mb__15 db pr oh" href="<?= site_url('Blog/bg1506202102') ?>">
                        <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/article-5.png"></div>
                    </a>
                    <div class="post-info mb__10">
                        <h4 class="mg__0 fs__16 mb__5 ls__0">
                            <a class="cd chp open" href="<?= site_url('Blog/bg1506202102') ?>">Ramai Dipakai Selebriti Tanah Air hingga Luar Negeri, Sarung Bantal Mulberry Silk Bikin Tetap Cantik saat Bangun Tidur</a>
                        </h4>
                        <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">11 Oktober 2021</time></span></span>
                    </div>
                    <div class="post-content">Tidur menggunakan sarung bantal berbahan sutra seolah menjadi tren di kalangan selebriti baik Tanah Air maupun luar negeri beberapa tahun belakang. </div>
                </article>
                <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                    <a class="mb__15 db pr oh" href="<?= site_url('Blog/bg1506202101') ?>">
                        <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/img-blog4-2.jpg"></div>
                    </a>
                    <div class="post-info mb__10">
                        <h4 class="mg__0 fs__16 mb__5 ls__0">
                            <a class="cd chp open" href="<?= site_url('Blog/bg1206202103') ?>">Sarung Bantal Mulberry Silk Pertama di Indonesia, Mulsk Pilih Bahan Baku dari Petani Lokal</a>
                        </h4>
                        <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">21 Juni 2021</time></span></span>
                    </div>
                    <div class="post-content">Mulsk akhirnya merilis produk pertamanya, yakni sarung bantal berbahan sutra murbei atau mulberry silk. Produk ini menjadi sarung bantal mulberry silk pertama yang dibuat di Indonesia. </div>
                </article>
                <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                    <a class="mb__15 db pr oh" href="<?= site_url('Blog/bg1206202103') ?>">
                        <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/pic-blog-3-1.jpg"></div>
                    </a>
                    <div class="post-info mb__10">
                        <h4 class="mg__0 fs__16 mb__5 ls__0">
                            <a class="cd chp open" href="<?= site_url('Blog/bg1206202103') ?>">Mulsk : Perpaduan Kemewahan, Kecantikan, dan Kesehatan dalam Setiap Produknya</a>
                        </h4>
                        <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">12 Juni 2021</time></span></span>
                    </div>
                    <div class="post-content">Sarung bantal menjadi perlengkapan tidur yang juga harus Anda perhatikan. Mengapa demikian?</div>
                </article>
                <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                    <a class="mb__15 db pr oh" href="<?= site_url('Blog/bg1206202102') ?>">
                        <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/silk.png"></div>
                    </a>
                    <div class="post-info mb__10">
                        <h4 class="mg__0 fs__16 mb__5 ls__0">
                            <a class="cd chp open" href="<?= site_url('Blog/bg1206202102') ?>">Termasuk Kain Berkualitas Tinggi, Apa itu Mulberry Silk?</a>
                        </h4>
                        <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">10 Juni 2021</time></span></span>
                    </div>
                    <div class="post-content">Kelebihan penggunaan mulberry silk untuk kecantikan dan kesehatan.</div>
                </article>
                <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                    <a class="mb__15 db pr oh" href="<?= site_url('Blog/bg1206202101') ?>">
                        <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog_1.jpg"></div>
                    </a>
                    <div class="post-info mb__10">
                        <h4 class="mg__0 fs__16 mb__5 ls__0">
                            <a class="cd chp open" href="<?= site_url('Blog/bg1206202101') ?>">3 Cara Jaga Tidur Tetap Berkualitas setelah Lelah Beraktivitas</a>
                        </h4>
                        <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">08 Juni 2021</time></span></span>
                    </div>
                    <div class="post-content">Pentingnya tidur berkualitas dengan memakai perlengkapan yang mendukung: sarung bantal dengan material utama mulberry silk.</div>
                </article>
            </div>
        </div>
    </div>
    <!--end blog post-->

</div>