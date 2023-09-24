let jq = jQuery.noConflict();
jq(document).ready(function ($) {
    $('#mb_login_form').on('submit', function (e) {
        e.preventDefault();
        let email = $('#mb_mail').val();
        let password = $('#mb_password').val();
        let remember_me = $('#mb_remember_me').prop('checked');

        $.ajax({
            url: mb_ajax.ajaxurl,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "wp_mb_auth_login",
                email: email,
                password: password,
                remember_me: remember_me,
                _nonce: mb_ajax._nonce
            },
            beforeSend: function () {
                $('#lr-loading').html('<div class="lds-facebook"><div></div><div></div><div></div></div>');
            },
            success: function (response) {
                if (response.success) {
                    Toastify({
                        text: response.message,
                        className: "success",
                        duration: 2000,
                    }).showToast();

                    setTimeout(function () {
                        window.location.href = document.documentURI;
                    }, 2000);
                }
            },
            error: function (error) {
                if (error.responseJSON.error) {
                    Toastify({
                        text: error.responseJSON.message,
                        className: "error",
                        duration: 2000,
                    }).showToast();
                }
            },
            complete: function () {
            },
        });
    });

    $('body').on('click', '#send_code', function (e) {
        e.preventDefault();
        let el = $(this);
        let user_phone = $('.user_phone').val();
        jQuery.ajax({
            url: lr_ajax.ajaxurl,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "wp_mb_auth_send_verification_code",
                user_phone: user_phone,
                _nonce: lr_ajax._nonce
            },
            beforeSend: function () {
                $('#send_code').html('<div class="lds-facebook"><div></div><div></div><div></div></div>');
            },
            success: function (response) {
                $('#user_phone_number').hide();
                $('#verification_code').show();
                el.attr('id', 'verify_code');
                el.text('اعتبار سنجی کد تایید');

                if(response.success){
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: response.message,
                        icon: 'success',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#66BB6A',
                        hideAfter: 3000,
                    })
                }
            },
            error: function (error) {
                if (error.responseJSON.error) {
                /*    alert(error.responseJSON.message);*/
                    /*alert(error.responseJSON.message);*/
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: error.responseJSON.message,
                        icon: 'error',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#FF1356',
                        hideAfter: 3000,
                    })
                }
            },
            complete: function () {
                $('#send_code').text('ارسال کد تایید');
            },
        });
    });
    $('body').on('click', '#verify_code', function (e) {
        e.preventDefault();
        let el = $(this);
        let verification_code = $('.verification_code').val();
        jQuery.ajax({
            url: lr_ajax.ajaxurl,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "wp_mb_auth_verify_verification_code",
                verification_code: verification_code,
                _nonce: lr_ajax._nonce
            },
            beforeSend: function () {
                $('#verify_code').html('<div class="lds-facebook"><div></div><div></div><div></div></div>');
            },
            success: function (response) {
                   /* $('#register_form').show();*/
                    $('#get_user_phone').html('<div id="register_form"> <div class="form-group"><label>نام و نام خانوادگی*</label> <input type="text" class="form-control display_name" value=""  placeholder="نام و نام خانوادگی..."> </div> <div class="form-group"><label>ایمیل*</label><input type="email..." class="form-control email" value="" placeholder="email..." dir="ltr"></div> <div class="form-group"><label>رمز عبور*</label><input type="text" class="form-control password" value=""></div> <div class="form-group"> <a href="" class="btn btn_apply w-100 " id="register_user">ثبت نام</a> </div></div>');

            },
            error: function (error) {
           /*     if (error.responseJSON.error) {
                        alert(error.responseJSON.message);
                }*/
                if (error.responseJSON.error) {
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: error.responseJSON.message,
                        icon: 'error',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#FF1356',
                        hideAfter: 3000,
                    })
                }
            },
            complete: function () {
                $('#verify_code').html('اعتبار سنجی کد تایید');
            },
        });
    });
    $('body').on('click','#register_user', function (e) {
        e.preventDefault();
        let el = $(this);
        let display_name = $('.display_name').val();
        let email = $('.email').val();
        let password = $('.password').val();
        $.ajax({
            url: lr_ajax.ajaxurl,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "wp_mb_register_user",
                display_name:display_name,
                email:email,
                password:password,
                _nonce: lr_ajax._nonce

            },
            beforeSend: function () {
                $('#register_user').html('<div class="lds-facebook"><div></div><div></div><div></div></div>');
            },
            success: function (response) {
                if(response.success){
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: response.message,
                        icon: 'success',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#66BB6A',
                        hideAfter: 3000,
                    })
                    setTimeout(function () {
                        window.location.href = "/";
                    }, 3000);
                }
            },
            error: function (error) {
                if (error.responseJSON.error) {
                    /*    alert(error.responseJSON.message);*/
                    /*alert(error.responseJSON.message);*/
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: error.responseJSON.message,
                        icon: 'error',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#FF1356',
                        hideAfter: 3000,
                    })
                }
            },
            complete: function () {
            },
        });
    });

    $('#send_recovery_mail').on('click', function (e) {
        e.preventDefault();
        let el = $(this);
        let email = $('.recover_email').val();
        jQuery.ajax({
            url: lr_ajax.ajaxurl,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "wp_mb_recover_password",
                email:email,
                _nonce: lr_ajax._nonce
            },
            beforeSend: function () {
                $('#send_recovery_mail').html('<div class="lds-facebook"><div></div><div></div><div></div></div>');
            },
            success: function (response) {
               if(response.success){
                    $.toast({
                        text: response.message,
                        icon: 'success',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#66BB6A',
                        hideAfter: 3000,
                    })
                }
            },
            error: function (error) {
                if (error.responseJSON.error) {
                    /*    alert(error.responseJSON.message);*/
                    /*alert(error.responseJSON.message);*/
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: error.responseJSON.message,
                        icon: 'error',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#FF1356',
                        hideAfter: 3000,
                    })
                }
            },
            complete: function () {
                $('#send_recovery_mail').text('ارسال مجدد لینک تغییر کلمه عبور');
            },
        });
    });

    $('#change_password').on('click', function (e) {
        e.preventDefault();
        let new_password = $('.new_password').val();
        let repeat_new_password = $('.repeat_new_password').val();
        let token= $('.recover_token').val();
        $.ajax({
            url: lr_ajax.ajaxurl,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "wp_mb_change_password",
                new_password:new_password,
                repeat_new_password : repeat_new_password,
                token:token,
                _nonce: lr_ajax._nonce
            },
            beforeSend: function () {
            },
            success: function (response) {
                if(response.success){
                    $.toast({
                        text: response.message,
                        icon: 'success',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#66BB6A',
                        hideAfter: 3000,
                    })
                }
            },
            error: function (error) {
                if (error.responseJSON.error) {
                    /*    alert(error.responseJSON.message);*/
                    /*alert(error.responseJSON.message);*/
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: error.responseJSON.message,
                        icon: 'error',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#FF1356',
                        hideAfter: 3000,
                    })
                }
            },
            complete: function () {
            },
        });
    });
})