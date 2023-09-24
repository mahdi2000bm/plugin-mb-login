let jq = jQuery.noConflict();

"use strict";

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
            if (response.success) {
                console.log(response.message)

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
                jq('#checkLoginRegister').html('<span class="is-loading-state"></span>');

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
        complete: function () {},
    })
}