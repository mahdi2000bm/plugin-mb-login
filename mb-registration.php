<?php /** Template Name: MB-Register */ ?>

<?php (! is_user_logged_in()) || wp_redirect(site_url()); ?>
<?php get_header(); ?>

    <div class="mb-form mb-register main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">عضویت</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="نام و نام خانوادگی"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="ایمیل"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="رمز عبور"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="تکرار رمز عبور"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="عضویت"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?= MB_PLUGIN_URL ?>/assets/img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="<?= site_url('login')?>" class="signup-image-link">قبلا ثبت نام کردم</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>