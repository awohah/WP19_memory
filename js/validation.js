$(function() {
    $('#user').keyup(function () {
        checkUser();
    });

    $('#password').keyup(function () {
        checkPassword();
    });
});

function checkUser(){
    let user_input = $('#user');
    let cur_val = user_input.val();
    let user_regex = "/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/";
    if (cur_val.match(user_regex) && cur_val !== ''){
        user_input.removeClass('invalid');
        user_input.addClass('valid');
        return true;
    } else{
        user_input.removeClass('valid');
        user_input.addClass('invalid');
        return false;
    }
}

function checkPassword(){
    let password_input = $('#password');
    let cur_val = password_input.val();
    let password_regex = "/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/";
    if (cur_val.match(password_regex) && cur_val !== ''){
        password_input.removeClass('invalid');
        password_input.addClass('valid');
        return true;
    } else{
        password_input.removeClass('valid');
        password_input.addClass('invalid');
        return false;
    }
}