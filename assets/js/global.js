jQuery(document).ready(function($)
{
    $('#inputEmailPhone').on('keyup', event => {
        console.log(event)
    });

    $('#checkLoginRegister').on('click', event => {
        let mailOrPhone = $('#inputEmailPhone').val();
        authType(mailOrPhone);
    });

    function authType(input) {
        console.log(input);
    }
})