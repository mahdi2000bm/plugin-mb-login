<?php /** Template Name: MB-Login */ ?>

<?php (! is_user_logged_in()) || wp_redirect(site_url()); ?>
<?php get_header(); ?>

    <div class="main">
    <!-- Sing in  Form -->
    <div class="mb-form mb-login main">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="<?= MB_PLUGIN_URL ?>/assets/img/signin-image.jpg" alt="sing up image"></figure>
                    <a href="<?= site_url('register')?>" class="signup-image-link">حساب ندارم</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">ورود</h2>
                    <form method="POST" class="register-form" id="mb_login_form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="mb_mail" placeholder="ایمیل"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="mb_password" placeholder="رمز عبور"/>
                        </div>
                        <div class="form-group display-flex display-flex-start">
                            <input type="checkbox" name="mb-remember-me" id="mb_remember_me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term">بخاطر بسپار</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="ورود"/>
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">ورود از طریق: </span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>

<?php get_footer(); ?>