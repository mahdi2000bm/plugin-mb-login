jQuery(document).ready(function($)
{
    $('#inputEmailPhone').on('keyup', function () {
        let input = $(this).val();
        let validate = validateInput(input, "EmailPhone", true);
        response("inputEmailPhone", validate.status, validate.message);
    });

    $('#checkLoginRegister').on('click', event => {
        let mailOrPhone = $('#inputEmailPhone').val();
        authType(mailOrPhone);
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
            if (validateEmail(input) === null) {
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

function response(targetId, type, message) {
    if (type === 400) {
        jQuery("#" + targetId).addClass('error')
    } else if (type === 200) {
        jQuery("#" + targetId).removeClass('error')
    }
}

function authType(input) {
    console.log(input);
}