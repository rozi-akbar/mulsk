<button class="imtt4_btn button pe_auto round_true btn_icon_false" onClick="window.history.back()" style="margin-left: 2%;">GO BACK</button>
<div id="nt_content" style="margin-top: 2%;">

    <!--hero banner-->
    <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
            <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= base_url() ?>assets/images/banner-blog-1.jpg"></div>
            <div class="container pr z_100">
                <h1 class="mb__5 cw"><?= $draft['title'] ?></h1>
                <p class="mg__0"><?= $draft['posted_at'] ?></p>
            </div>
        </div>
    </div>
    <!--end hero banner-->

    <!--main content-->
    <div class="container container_cat cat_default mt__60 mb__20">
        <div class="row nt_single_blog">
            <div class="col-lg-12 col-xs-12">
                <div class="kalles-section nt_section type_isotope">
                    <div class="cb">
                        <p> <?= $draft['content'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end main content-->
</div>