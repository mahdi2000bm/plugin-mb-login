jQuery(document).ready(function($)
{
    $('#inputEmailPhone').on('keyup', function () {
        let input = $(this).val();
        let validate = validateInput(input, "EmailPhone", true);
        responseView("inputEmailPhone", validate.status, validate.message);
    });

    $('#checkLoginRegister').on('click', event => {
        let mailOrPhone = $('#inputEmailPhone').val();
        let validate = validateInput(mailOrPhone, "EmailPhone", true);
        if (validate.status) {
            authType(mailOrPhone);
        } else {
            responseView("inputEmailPhone", validate.status, validate.message);
        }
    });
})

function validateInput (input, type, require = false) {

    // returned status
    let validate = {
        "status" : 200,
        "message" : "",
    };

    // Input require but user dont enter
    if (require && input === "") {
        validate.status = 400;
        validate.message = "مقدار نمی تواند خالی باشد.";
        return validate
    }

    // Validate input by input type
    switch (type) {
        case "EmailPhone":
            if (validateEmail(input) === null && validatePhone(input) === null) {
                validate.status = 400;
                validate.message = "لطفا ایمیل یا شماره را به صورت کامل و صحیح وارد کنید.";
            }
            break;
        case "Email":
            validate = validateEmail(input);
            break;
    }

    return validate;
}

function validateEmail (email) {
    return String(email).toLowerCase().match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}

function validatePhone (mobile) {
    return String(mobile).toLowerCase().match(
        /((0?9)|(\+?989))\d{9}/g
    );
}

function responseView(targetId, type, message) {
    if (type === 400) {
        jQuery("#" + targetId).addClass('valid-error');
        jQuery(".error-text").text(message);
        jQuery(".error-text").removeClass('fade');
    } else if (type === 200) {
        jQuery("#" + targetId).removeClass('valid-error');
        jQuery(".error-text").addClass('fade');
    }
}

function authType(input) {
    console.log(input);
}