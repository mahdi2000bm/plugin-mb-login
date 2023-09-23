jQuery(document).ready(function($)
{
    $('#inputEmailPhone').on('keyup', function () {
        console.log($(this).val())
    });

    $('#checkLoginRegister').on('click', event => {
        let mailOrPhone = $('#inputEmailPhone').val();
        authType(mailOrPhone);
    });

    function authType(input) {
        console.log(input);
    }
})