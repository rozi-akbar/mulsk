<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item <?= $this->uri->segment(2) == 'Dashboard' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= base_url() ?>Administrator/Dashboard" class="kt-menu__link">
                    <i class="kt-menu__link-icon fa fa-chalkboard"></i>
                    <span class="kt-menu__link-text">Dashboard </span>
                </a>
            </li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Mulsk Banner</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item <?= $this->uri->segment(1) == '' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="<?= base_url() ?>Home/Banner" class="kt-menu__link">
                    <i class="kt-menu__link-icon fa fa-digital-tachograph"></i>
                    <span class="kt-menu__link-text">Home Banner </span>
                </a>
            </li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Mulsk Blog</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item <?= $this->uri->segment(2) == 'Blog' ? 'kt-menu__item--open kt-menu__item--active' : '' ?>" aria-haspopup="true">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon fa fa-file-invoice"></i>
                    <span class="kt-menu__link-text">Blog</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item <?= $this->uri->segment(3) == 'DataBlog' || $this->uri->segment(3) == 'NewBlog' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                            <a href="<?= site_url('BlogAdmin/Blog/DataBlog') ?>" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Create Blog</span>
                            </a>
                        </li>
                        <!-- <li class="kt-menu__item <?= $this->uri->segment(3) == 'BlogTrash' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                                            <a href="<?= site_url('') ?>" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                                    <span></span>
                                                </i>
                                                <span class="kt-menu__link-text">Trash</span>
                                            </a>
                                        </li> -->
                    </ul>
                </div>
            </li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Mulsk Products</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu <?= $this->uri->segment(2) == 'M_Product' ? 'kt-menu__item--open kt-menu__item--active' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon fa fa-boxes"></i>
                    <span class="kt-menu__link-text">Master Product</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item <?= $this->uri->segment(3) == 'ProductData' || $this->uri->segment(3) == 'CreateProduct' || $this->uri->segment(3) == 'CreateProductData' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                            <a href="<?= site_url('MasterProduct/M_Product/ProductData') ?>" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Product Data</span>
                            </a>
                        </li>
                        <li class="kt-menu__item <?= $this->uri->segment(3) == 'M_ShadeColor' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                            <a href="<?= site_url('MasterProduct/M_Product/M_ShadeColor') ?>" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="kt-menu__link-text">Shade Color</span>
                            </a>
                        </li>
                        <!--<li class="kt-menu__item <?= $this->uri->segment(3) == 'ListProduct' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true">
                                            <a href="<?= site_url('MasterProduct/M_Product/ListProduct') ?>" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                                    <span></span>
                                                </i>
                                                <span class="kt-menu__link-text">List Product</span>
                                            </a>
                                        </li> -->
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- end:: Aside Menu -->