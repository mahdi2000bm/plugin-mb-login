"use strict";
let jq = jQuery.noConflict();

function mbAjaxEmail(input) {
    jq.ajax({
        url: mb_ajax.ajaxurl,
        method: "POST",
        dataType: "JSON",
        data: {
            action: "mb_login_via_email",
            _nonce: mb_ajax._nonce,
            input: input,
            remember_me : true
        },
        beforeSend: function () {
            jq('#checkLoginRegister').html('<span class="is-loading-state"></span>');
        },
        success: function (response) {
            if (response.status){
                switch (response.action) {
                    case "register":
                        showNextSectionStep("home", "register-tab");
                        break;
                    case "password":
                        showNextSectionStep("home", "login-tab");
                        break;
                    case "otp":
                        //
                        break;
                }
            }
        },
        error: function (error) {
            console.log(response)

            if (error.responseJSON.error) {
                Toastify({
                    text: error.responseJSON.message,
                    className: "error",
                    duration: 2000,
                }).showToast();
            }
        },
        complete: function () {
            jq('#checkLoginRegister').html('ورود');
        },
    })
}
function mbAjaxPhone(input) {
    jq.ajax({
        url: mb_ajax.ajaxurl,
        method: "POST",
        dataType: "JSON",
        data: {
            action: "mb_login_via_phone",
            _nonce: mb_ajax._nonce,
            input: input,
            remember_me : true
        },
        beforeSend: function () {
            jq('#checkLoginRegister').html('<span class="is-loading-state"></span>');
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
        complete: function () {},
    })
}
function mbAjaxLogin(email, password) {
    jq.ajax({
        url: mb_ajax.ajaxurl,
        method: "POST",
        dataType: "JSON",
        data: {
            action: "mb_login_via_password",
            _nonce: mb_ajax._nonce,
            email: email,
            password: password,
            remember_me : true
        },
        beforeSend: function () {
            jq('#login').html('<span class="is-loading-state"></span>');
        },
        success: function (response) {
            // Toastify({
            //     text: response.responseJSON.message,
            //     className: "error",
            //     duration: 2000,
            // }).showToast();

            // Redirect in panel

            window.location.href = document.documentURI;
        },
        error: function (error) {
            // Toastify({
            //     text: error.responseJSON.message,
            //     className: "error",
            //     duration: 2000,
            // }).showToast();

            responseView("inputPassword", 400, error.responseJSON.message);
        },
        complete: function () {
            jq('#login').html('ورود');
        },
    })
}
