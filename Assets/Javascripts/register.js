$(document).ready(function () { 
    $('#registration').click(function ()
    {
        let password = $('#registerForm #password').val();
        let name = $('#registerForm #userName').val();
        let email = $('#registerForm #email').val();
        let number = $('#registerForm #mobileNumber').val();
        let confPassword = $('#confirmPassword').val();
        console.log(password);
        console.log(confPassword);
        if(password!=confPassword)
        {
            $('.error').attr('class', ($('.error').attr('class')+" show"));
        }
        else
        {
            $('#registerForm').submit();
        }

    });

});