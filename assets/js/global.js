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

        if (require) {
            if (input === "")
                return "خالی است";
        }

        switch (type) {
            case "EmailPhone":
                    return validateEmail(input);
                break;
            case "":
                break;
            case "":
                break;
        }
    }

    function authType(input) {
        console.log(input);
    }
})

function validateEmail (email) {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
}