<style>
    .post-author {
        font-size: 12px;
    }

    .everything_you {
        font-size: 36px;
        font-weight: 700;
        line-height: 46.87px;
    }
</style>
<div id="nt_content">

    <!--hero banner-->
    <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
            <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= base_url() ?>assets/images/banner-blog.jpg"></div>
            <div class="container pr z_100">
                <h1 class="mb__5 cw">BLOG</h1>
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
                        <span class="everything_you">Everything you need to know about Mulsk!</span>
                    </div>
                    <div class="cat_sortby cat_sortby_js col-lg-6 col-12 tr kalles_dropdown kalles_dropdown_container">
                        <a class="in_flex fl_between al_center sortby_pick kalles_dropDown_label" href="#">
                            <span class="lbl-title sr_txt dn">Date, new to old</span>
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
                                <a data-label="Date, old to new" class="kalles_dropdown_option truncate" href="#">Date, old to new</a>
                                <a data-label="Date, new to old" class="kalles_dropdown_option truncate" href="#">Date, new to old</a>
                                <!-- <a data-label="Alphabetically, A-Z" id="sort0" class="kalles_dropdown_option truncate common_selector">Alphabetically, A-Z</a>
                                <a data-label="Alphabetically, Z-A" id="sort1" class="kalles_dropdown_option truncate common_selector">Alphabetically, Z-A</a>
                                <a data-label="Date, old to new" id="sort2" class="kalles_dropdown_option truncate common_selector">Date, old to new</a>
                                <a data-label="Date, new to old" id="sort3" class="kalles_dropdown_option truncate common_selector">Date, new to old</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <!-- description and review -->
                <div id="wrap_des_pr">
                    <div class="container container_des">
                        <div class="kalles-section-pr_description kalles-section kalles-tabs sp-tabs nt_section" style="padding-top: 0;">
                            <div class="filter_data articles products art_des2 nt_products_holder row des_cnt_1 nt_cover ratio4_3 position_8 equal_nt" id="blog-data">
                            </div>
                            <br>
                            <div class="products-footer tc">
                                <nav class="nt-pagination w__100 tc paginate_ajax">
                                    <div id="pagination_link"></div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end description and review -->
            </div>
        </div>
    </div>
    <!--end main content-->
</div>
<script src="<?= base_url() ?>assets/components/jquery/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {

        filter_data(1);

        $('.common_selector').click(function() {
            filter_data(1);
        });

        function get_filter(element_name) {
            var element = document.getElementById(element_name);;
            var txt = "";
            var i;
            for (i = 0; i < element.length; i++) {
                if (element[i].checked) {
                    txt = txt + element[i].textContent + "";
                }
            }
            return txt;
        }

        function filter_data(page) {
            $('.filter_data').html('<h3> Searching Data . . . </h3>');
            // var sort = document.getElementById('sort').textContent;
            // var sort = get_filter('sort');
            // alert(sort);
            $.ajax({
                url: "<?= base_url(); ?>Blog/Blog/fetch_data/" + page,
                method: "POST",
                dataType: "JSON",
                data: {},
                beforeSend: function() {
                    $('#showing_result').html("<h1> MOHON TUNGGU ... </h1>");
                },
                success: function(data) {
                    $('.filter_data').html(data.blog);
                    $('#pagination_link').html(data.pagination_link);
                    $('#showing_result').html(data.showing_result);
                }
            })
        }

        $(document).on("click", ".pagination li a", function(event) {
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            filter_data(page);
            var konten = document.getElementById("blog-data");
            konten.scrollIntoView();
        });
    });

    function searchby() {
        document.getElementById('searchby_id').value = '';
    }

    function searchby_id() {
        document.getElementById('searchby').value = '';
    }
</script>

<!-- BACKUP ARTICLE STATIS -->
<!-- tab contents -->
<!-- <div class="panel entry-content sp-tab des_mb_2 des_style_1 active" id="tab_1">
                                <div class="articles products art_des2 nt_products_holder row des_cnt_1 nt_cover ratio4_3 position_8 equal_nt">
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg0912202101') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/article9_2.jpg"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:17:00Z">09 Desember 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg0912202101') ?>">Sarung Bantal Mulsk Mampu Maksimalkan Penyerapan Skincare ke Kulit</a>
                                            </h4>
                                        </div>
                                    </article>
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg2911202101') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/article8_mulsk.jpg"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:17:00Z">29 November 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg2911202101') ?>">Ogah Alami Kulit Berjerawat? Perhatikan Skincare hingga Sarung Bantalmu</a>
                                            </h4>
                                        </div>
                                    </article>
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg1511202101') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/article-7.jpg"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:17:00Z">15 Oktober 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg1511202101') ?>">Punya Segudang Manfaat, Sarung Bantal Mulberry Silk Jadi Ide Hadiah Istimewa untuk Orang-orang Terkasih</a>
                                            </h4>
                                        </div>
                                    </article>
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg1506202103') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/img-blog6.jpg"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:17:00Z">13 Oktober 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg1506202103') ?>">Benarkah Sarung Bantal Mulberry Silk Bisa Cegah Jerawat di Wajah?</a>
                                            </h4>
                                        </div>
                                    </article>
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg1506202102') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/article-5.png"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:17:00Z">11 Oktober 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg1506202102') ?>">Ramai Dipakai Selebriti Tanah Air hingga Luar Negeri, Sarung Bantal Mulberry Silk Bikin Tetap Cantik saat Bangun Tidur</a>
                                            </h4>
                                        </div>
                                    </article>
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg1506202101') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog/img-blog4-2.jpg"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:17:00Z">21 Juni 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg1506202101') ?>">Sarung Bantal Mulberry Silk Pertama di Indonesia, Mulsk Pilih Bahan Baku dari Petani Lokal</a>
                                            </h4>
                                        </div>
                                    </article>
                                </div>
                            </div> -->
<!-- <div class="panel entry-content sp-tab des_mb_2 des_style_1 dn" id="tab_2">
                                <div class="articles products art_des2 nt_products_holder row des_cnt_1 nt_cover ratio4_3 position_8 equal_nt">
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg1206202103') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/pic-blog-3-1.jpg"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">12 Juni 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg1206202103') ?>">Mulsk : Perpaduan Kemewahan, Kecantikan, dan Kesehatan dalam Setiap Produknya</a>
                                            </h4>
                                        </div>
                                    </article>
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg1206202102') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/silk.png"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:22:00Z">10 Juni 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg1206202102') ?>">Termasuk Kain Berkualitas Tinggi, Apa itu Mulberry Silk?</a>
                                            </h4>
                                        </div>
                                    </article>
                                    <article class="post_nt_loop post_1 col-lg-4 col-md-6 col-12 mb__40">
                                        <a class="mb__10 db pr oh" href="<?= site_url('Blog/bg1206202101') ?>">
                                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="<?= base_url() ?>assets/images/blog_1.jpg"></div>
                                        </a>
                                        <div class="post-info">
                                            <span class="post-author mr__5"><span class="cd"><time datetime="2020-04-06T02:17:00Z">08 Juni 2021</time></span></span>
                                            <h4 class="mg__0 fs__16 mt__10 ls__0">
                                                <a class="cd chp open" href="<?= site_url('Blog/bg1206202101') ?>">3 Cara Jaga Tidur Tetap Berkualitas setelah Lelah Beraktivitas</a>
                                            </h4>
                                        </div>
                                    </article>
                                </div>
                            </div> -->
<!-- end tab contents -->

<!-- tab buttons -->
<!-- <ul class="ul_none ul_tabs is-flex fl_center fs__16 des_mb_2 des_style_1">
                                <li class="tab_title_block active">
                                    <a class="db cg truncate pr" href="#tab_1">1</a>
                                </li>
                                <li class="tab_title_block">
                                    <a class="db cg truncate pr" href="#tab_2">2</a>
                                </li>
                            </ul> -->
<!-- end tab buttons -->
<!-- END BACKUP ARTICLE STATIS -->