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

        <div class="kt-wizard-v4" id="kt_wizard_v4" data-ktwizard-state="step-first">

            <!--begin: Form Wizard Nav -->
            <div class="kt-wizard-v4__nav">
                <div class="kt-wizard-v4__nav-items">

                    <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                    <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                        <div class="kt-wizard-v4__nav-body">
                            <div class="kt-wizard-v4__nav-number">
                                1
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    Add Description
                                </div>
                                <div class="kt-wizard-v4__nav-label-desc">
                                    Create Product Description
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                        <div class="kt-wizard-v4__nav-body">
                            <div class="kt-wizard-v4__nav-number">
                                2
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    Product Gallery
                                </div>
                                <div class="kt-wizard-v4__nav-label-desc">
                                    Setup Your Product Gallery
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                        <div class="kt-wizard-v4__nav-body">
                            <div class="kt-wizard-v4__nav-number">
                                3
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    Product Icon
                                </div>
                                <div class="kt-wizard-v4__nav-label-desc">
                                    Setup Your Product Gallery
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                        <div class="kt-wizard-v4__nav-body">
                            <div class="kt-wizard-v4__nav-number">
                                4
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    Completed
                                </div>
                                <div class="kt-wizard-v4__nav-label-desc">
                                    Publish and Submit
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end: Form Wizard Nav -->
            <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-grid">
                        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                            <!--begin: Form Wizard Form-->
                            <form class="kt-form" id="kt_form">

                                <!--begin: Form Wizard Step 1-->
                                <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                    <div class="kt-heading kt-heading--md">Enter your Account Details</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__form">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 1-->

                                <!--begin: Form Wizard Step 2-->
                                <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Setup Your Address</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__form">
                                            <div class="form-group">
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 2-->

                                <!--begin: Form Wizard Step 3-->
                                <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Enter your Payment Details</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__form">
                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 3-->

                                <!--begin: Form Wizard Step 4-->
                                <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__review">
                                            
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 4-->

                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                        Previous
                                    </button>
                                    <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                        Submit
                                    </button>
                                    <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                        Next Step
                                    </button>
                                </div>

                                <!--end: Form Actions -->
                            </form>

                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>