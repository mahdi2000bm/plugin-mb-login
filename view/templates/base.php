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
						<div class="d-flex flex-stack py-2">
							<!--begin::Back link-->
							<div class="me-2"></div>
							<!--end::Back link-->
							<!--begin::ثبت نام link-->
							<div class="m-0">
								<span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="ورود-head-desc">آیا هنوز عضو نشده</span>
								<a href="../../demo1/dist/authentication/layouts/fancy/signup.html" class="link-primary fw-bold fs-5" data-kt-translate="ورود-head-link">ثبت نام</a>
							</div>
							<!--end::ثبت نام link=-->
						</div>
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
										<h1 class="text-dark mb-3 fs-3x" data-kt-translate="ورود-title">ورود</h1>
										<!--end::Title-->
										<!--begin::Text-->
										<div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">دسترسی نامحدود داشته باشید و درآمد کسب کنید</div>
										<!--end::Link-->
									</div>
									<!--begin::Heading-->
									<!--begin::Input group=-->
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="text" placeholder="ایمیل" name="email" autocomplete="off" data-kt-translate="ورود-input-email" class="form-control form-control-solid" />
										<!--end::Email-->
									</div>
									<!--end::Input group=-->
									<div class="fv-row mb-7">
										<!--begin::کلمه عبور-->
										<input type="text" placeholder="کلمه عبور" name="password" autocomplete="off" data-kt-translate="ورود-input-password" class="form-control form-control-solid" />
										<!--end::کلمه عبور-->
									</div>
									<!--end::Input group=-->
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
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
											<span class="indicator-label" data-kt-translate="ورود-submit">ورود</span>
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
											<div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6" data-kt-translate="general-or">Or</div>
											<!--begin::Symbol-->
											<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
												<img alt="Logo" src="/assets/media/svg/brand-logos/google-icon.svg" class="p-4" />
											</a>
											<!--end::Symbol-->
											<!--begin::Symbol-->
											<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
												<img alt="Logo" src="/assets/media/svg/brand-logos/facebook-3.svg" class="p-4" />
											</a>
											<!--end::Symbol-->
											<!--begin::Symbol-->
											<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
												<img alt="Logo" src="/assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show p-4" />
												<img alt="Logo" src="/assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show p-4" />
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
							<!--begin::Toggle-->
							<button class="btn btn-flex btn-link rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
								<img data-kt-element="current-lang-flag" class="w-25px h-25px rounded-circle me-3" src="/assets/media/flags/united-states.svg" alt="" />
								<span data-kt-element="current-lang-name" class="me-2">انگلیسی</span>
								<i class="ki-duotone ki-down fs-2 text-muted rotate-180 m-0"></i>
							</button>
							<!--end::Toggle-->
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4" data-kt-menu="true" id="kt_auth_lang_menu">
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="انگلیسی">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="/assets/media/flags/united-states.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">انگلیسی</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="اسپانیایی">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="/assets/media/flags/spain.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">اسپانیایی</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="آلمان">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="/assets/media/flags/germany.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">آلمان</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="ژاپنی">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="/assets/media/flags/japan.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">ژاپنی</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="فرانسه">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="/assets/media/flags/france.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">فرانسه</span>
									</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				<div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url(assets/media/auth/bg11.png)"></div>
				<!--begin::Body-->
			</div>
			<!--end::Authentication - ورود-->
<?php include "./parts/footer.php" ?>