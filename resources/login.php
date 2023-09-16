<?php function wpMbLoginLayout() { ?>
    <!-- Start Auth buttons -->
    <ul class="mb-nav-menu display-flex-center nav-menu-social align-to-left">
        <?php if(! is_user_logged_in()): ?>
            <li class="login_click light">
                <button><a href="<?= site_url('login')?>" >ورود</a></button>
            </li>
            <li class="login_click theme-bg">
                <button><a href="<?= site_url('register')?>">ثبت نام</a></button>
            </li>
        <?php else: ?>
            <li class="login_click light">
                <button><a href="#" >پنل کاربری</a></button>
            </li>
        <?php endif; ?>

    </ul>
    <!-- End Auth buttons -->
<?php }
add_shortcode('mb-login','wpMbLoginLayout');
