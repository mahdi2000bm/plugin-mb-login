jQuery(document).ready(function($)
{
    function authType(input) {
        console.log(input);
    }

    $('#checkLoginRegister').on('click', event => {
        let mailOrPhone = $('#inputEmailPhone').val();
        authType(mailOrPhone);
    });
})