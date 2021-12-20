<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <?= $file ?>
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">

        <div class="row">
            <div class="col-12">

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Input Blog Mulsk
                            </h3>
                        </div>
                    </div>
                    <form class="kt-form" method="post" enctype="multipart/form-data" action="<?= site_url('Home/Banner/Act_crud/' . $cAction . '') ?>">
                        <div class="kt-portlet__body">
                            <div class="kt-portlet__body">
                                <div class="form-group">
                                    <label>Image Banner Desktop</label>
                                    <div></div>
                                    <input type="file" name="image_desktop" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Image Banner Mobile</label>
                                    <div></div>
                                    <input type="file" name="image_mobile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="reset" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>