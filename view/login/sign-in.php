<?php include "./parts/header.php" ?>
        <!--begin::Authentication - ورود -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Logo-->
            <a href="../../demo1/dist/index.html" class="d-block d-lg-none mx-auto py-20">
                <img alt="Logo" src="/assets/media/logos/default.svg" class="theme-light-show h-25px" />
                <img alt="Logo" src="/assets/media/logos/default-dark.svg" class="theme-dark-show h-25px" />
            </a>
            <!--end::Logo-->
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                    <!--begin::Header-->
                    <div class="d-flex flex-stack py-2"></div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="py-20">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Heading-->
                                <div class="text-start mb-10">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3 fs-3x" data-kt-translate="ورود-یا-ثبت نام">ورود یا ثبت نام</h1>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">برای استفاده از خدمات ما، وارد حساب کاربری خود شوید یا ثبت نام کنید.</div>
                                    <!--end::Link-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                    <input type="text" placeholder="شماره همراه" name="phone-number" autocomplete="off" data-kt-translate="login-input-phone-number" class="form-control form-control-solid" />
                                    <!--end::Email-->
                                </div>
                                <!--end::Input group=-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-wrap gap-3 fs-base fw-semibold mb-10">
                                    <div></div>
                                    <!--begin::Link-->
                                    <a href="../../demo1/dist/authentication/layouts/fancy/reset-password.html" class="link-primary" data-kt-translate="ورود-forgot-password">فراموشی کلمه عبور </a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Actions-->
                                <div class="d-flex flex-stack">
                                    <!--begin::ارسال-->
                                    <button id="kt_sign_in_submit" class="btn btn-primary me-2 flex-shrink-0">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label" data-kt-translate="login-submit">ادامه</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">
                                            <span data-kt-translate="general-progress">Please wait...</span>
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                        <!--end::Indicator progress-->
                                    </button>
                                    <!--end::ارسال-->
                                    <!--begin::Social-->
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6" data-kt-translate="general-or">یا</div>
                                        <!--begin::Symbol-->
                                        <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                                            <img alt="Logo" src="/assets/media/svg/brand-logos/google-icon.svg" class="p-4" />
                                        </a>
                                        <!--end::Symbol-->
                                    </div>
                                    <!--end::Social-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--begin::Body-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="m-0">
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url(assets/media/auth/bg.png)"></div>
            <!--begin::Body-->
        </div>
        <!--end::Authentication - ورود-->
<?php include "./parts/footer.php" ?>