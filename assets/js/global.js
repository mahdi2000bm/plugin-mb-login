/**
 * Validates the input and returns the response in json format
 *
 * @param input
 * @param type
 * @param require
 * @returns {{message: string, status: number}}
 */
function validateInput (input, type, require = false) {

    // returned status
    let validate = {
        "status" : 200,
        "message" : "اعتبار سنجی موفق.",
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
            if (validatePhone(input) !== null) {
                validate.type = "phone";
                break;
            }
            if (validateEmail(input) !== null) {
                validate.type = "email";
                break;
            }

            validate.status = 400;
            validate.message = "لطفا ایمیل یا شماره را به صورت کامل و صحیح وارد کنید.";

            break;
        case "Email":
            validate = validateEmail(input);
            break;
        default:
            break
    }

    return validate;
}

/**
 * if not valid null returned
 *
 * @returns {RegExpMatchArray}
 * @param email
 */
function validateEmail (email) {
    return String(email).toLowerCase().match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}

/**
 * if not valid null returned
 *
 * @param mobile
 * @returns {RegExpMatchArray}
 */
function validatePhone (mobile) {
    return String(mobile).toLowerCase().match(
        /((0?9)|(\+?989))\d{9}/g
    );
}

/**
 * Generated error to selected field
 *
 * @param targetId
 * @param type
 * @param message
 */
function responseView(targetId, type, message) {
    if (type === 400) {
        jq("#" + targetId).addClass('valid-error');
        jq(".error-text").text(message);
        jq(".error-text").removeClass('fade');
    } else if (type === 200) {
        jq("#" + targetId).removeClass('valid-error');
        jq(".error-text").addClass('fade');
    }
}

/**
 * Specifying the input type and calling the corresponding Ajax
 * Must be email or phone number
 *
 * @param input
 * @param type
 */
function authType(input,type) {
    switch (type) {
        case "email":
            mbAjaxEmail(input);
            break;
        case "phone":
            mbAjaxPhone(input);
            break;
        default:
            // toast error
    }
}

/**
 * Hides one section and shows the other
 *
 * @param fade
 * @param active
 */
function showNextSectionStep(fade, active) {
    jq("#" + fade).removeClass('in active');
    jq("#" + active).addClass('in active');
}

// Listening to user behaviors
jq(document).ready(function($) {
    // When user enter phone or email address
    $('#inputEmailPhone').on('keyup', function () {
        let input = $(this).val();
        let validate = validateInput(input, "EmailPhone", true);
        responseView("inputEmailPhone", validate.status, validate.message);
    });

    // When user enter password
    $('#inputPassword').on('keyup', function () {
        let input = $(this).val();
        let validate = validateInput(input, "password", true);
        responseView("inputPassword", validate.status, validate.message);
    });

    // When user click on continue
    $('#checkLoginRegister').on('click', function () {
        let mailOrPhone = $('#inputEmailPhone').val();
        $('span.user-email').text(mailOrPhone);
        let validate = validateInput(mailOrPhone, "EmailPhone", true);
        if (validate.status === 200) {
            authType(mailOrPhone, validate.type);
        } else {
            responseView("inputEmailPhone", validate.status, validate.message);
        }
    });

    // When user submit password
    $('form.login-form').on('submit', function (event) {
        event.preventDefault();

        let email = $('#inputEmailPhone').val();
        let password = $('#inputPassword').val();

        let validate = validateInput(password, "password", true);
        if (validate.status === 200) {
            mbAjaxLogin(email, password);
        } else {
            responseView("inputPassword", validate.status, validate.message);
        }
    });

    // When user submit for register
    $('form.form-register').on('submit', function (event) {
        event.preventDefault();

        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();

        let validate = validateInput(firstname, "text", true);
        if (validate.status === 200) {
            console.log("Ok")
        } else {
            responseView("firstname", validate.status, validate.message);
        }
    });

    // When user click to back step
    $('a.edit-email').on('click', function () {
        $('.error-text').html("");
        let id = $('.tab-pane.in.active').attr('id');
        showNextSectionStep(id, "home");
    })
})
