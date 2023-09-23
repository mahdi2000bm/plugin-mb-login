jQuery(document).ready(function($)
{
    $('#inputEmailPhone').on('keyup', function () {
        let input = $(this).val();
        let validate = validateInput(input, "EmailPhone", true);
        console.log(validate)
    });

    $('#checkLoginRegister').on('click', event => {
        let mailOrPhone = $('#inputEmailPhone').val();
        authType(mailOrPhone);
    });

    function validateInput (input, type, require = false) {

        let validate = {
            "status" : true,
            "message" : true,
        };

        if (require && input === "") {
            validate.status = false;
            validate.message = "لطفا ایمیل یا شماره را به صورت کامل و صحیح وارد کنید.";
            return validate
        }

        switch (type) {
            case "EmailPhone":
                    if (validateEmail(input) === null) {
                        validate.status = false;
                        validate.message = "لطفا ایمیل یا شماره را به صورت کامل و صحیح وارد کنید.";
                    }
                break;
            case "Email":
                validate = validateEmail(input);
                break;
        }

        return validate;
    }

    function authType(input) {
        console.log(input);
    }
})

function validateEmail (email) {
    return String(email).toLowerCase().match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
}