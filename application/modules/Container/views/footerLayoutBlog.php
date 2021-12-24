<!-- footer -->
<footer id="nt_footer" class="bgbl footer-1">
    <div id="kalles-section-footer_top" class="kalles-section footer__top type_instagram">
        <div class="footer__top_wrap footer_sticky_false footer_collapse_true nt_bg_overlay pr oh pb__30 pt__80">
            <div class="container pr z_100">

            </div>
        </div>
    </div>
    <div id="kalles-section-footer_bot" class="kalles-section footer__bot">
        <div class="footer__bot_wrap pt__20 pb__20">
            <div class="container pr tc">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col_2">
                        Copyright © <?= date('Y') ?>. PT Kosmetika Cantik Indonesia IT Team. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

</div>

<!--mask overlay-->
<div class="mask-overlay ntpf t__0 r__0 l__0 b__0 op__0 pe_none"></div>
<!--end mask overlay-->

<!-- mobile menu -->
<div id="nt_menu_canvas" class="nt_fk_canvas nt_sleft dn lazyload">
    <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
    <div class="mb_nav_tabs flex al_center mb_cat_true">
        <img class="w__100 logo_mobile dn_lg max-width__100px max-height__57px ml-2" src="<?= base_url() ?>assets/images/svg/mulsk2.svg" />
    </div>
</div>
<!-- end mobile menu -->

<!-- back to top button-->
<a id="nt_backtop" class="pf br__50 z__100 des_bt1" href="#"><span class="tc br__50 db cw"><i class="pr pegk pe-7s-angle-up"></i></span></a>

<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/jarallax.min.js"></script>
<script src="<?= base_url() ?>assets/js/packery.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.hoverIntent.min.js"></script>
<script src="<?= base_url() ?>assets/js/magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/js/flickity.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/lazysizes.min.js"></script>
<script src="<?= base_url() ?>assets/js/js-cookie.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.countdown.min.js"></script>
<script src="<?= base_url() ?>assets/js/interface.js"></script>
<!-- <script src="<?= base_url() ?>assets/js/disabled_CtrlShiftC.js"></script>
<script src="<?= base_url() ?>assets/js/disabled_viewPageSource.js"></script> -->
<script>
    function colorSelector(urutan) {
        $(".p-thumb.flickity-enabled").flickity(
            "select",
            urutan,false, true 
        );
    }
</script>
</body>

</html>