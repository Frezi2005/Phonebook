$(() => {

    const loginForm = $(".login-form");
    const registerForm = $(".register-form");
    const btn = $("#btn");

    $(".toggle-btn-register").click(() => {
        loginForm.css("transition", ".5s");
        loginForm.css("margin-left", "-400px");
        registerForm.css("margin-left", "50px");
        btn.css("left", "125px");
    });

    $(".toggle-btn-login").click(() => {
        registerForm.css("margin-left", "400px");
        loginForm.css("margin-left", "50px");
        btn.css("left", "0");
    });

});