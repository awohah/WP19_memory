function checkUser(){
    let user_input = $('#user');
    let cur_val = user_input.val();
    let user_regex = "^(?!.*__.*)(?!.*\\.\\..*)[a-zA-Z0-9_.]+$";
    if (cur_val.match(user_regex) && cur_val !== ''){
        user_input.removeClass('is-invalid');
        user_input.addClass('is-valid');
        return true;
    } else{
        user_input.removeClass('is-valid');
        user_input.addClass('is-invalid');
        return false;
    }
}


function checkPassword() {
    let password_input = $('#password');
    let cur_val = password_input.val();
    let password_regex = "^(?=.*\\d).{4,}$";
    if (cur_val.match(password_regex) && cur_val !== '') {
        password_input.removeClass('is-invalid');
        password_input.addClass('is-valid');
        return true;
    } else {
        password_input.removeClass('is-valid');
        password_input.addClass('is-invalid');
        return false;
    }
}





function check () {


    $('#user').keyup(function () {
        checkUser();
    });


    $('#password').keyup(function () {
        checkPassword();
    });


}


$(document).ready(function() {
    check();

});
