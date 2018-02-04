$(() => {
    // $("#login-form").validate({
    //     rules: {
    //         username: {
    //             required: true,
    //             minlength: 5
    //         },
    //         password: {
    //             required: true,
    //             minlength: 6
    //         }
    //     }
    // });
    //
    //
    // $("#signup-form").validate({
    //     rules: {
    //         username_signup: {
    //             required: true,
    //             minlength: 5
    //         },
    //         email_signup: {
    //             required: true,
    //             email: true
    //         },
    //         password_signup: {
    //             required: true,
    //             minlength: 6
    //         },
    //         password_signup_c: {
    //             required: true,
    //             minlength: 6,
    //             equalTo: "#password_signup"
    //         }
    //     }
    // });


    $("a[href*='#signup']").on('click', () => {
        $("#login-form").toggle();
        $("#signup-form").toggle();
    });

    $("a[href*='#login']").on('click', () => {
        $("#login-form").toggle();
        $("#signup-form").toggle();
    });

    if (window.location.hash == '#signup') {
        $("#login-form").hide();
        $("#signup-form").show();
    } else if (window.location.hash == '#login') {
        $("#login-form").show();
        $("#signup-form").hide();
    }

});

