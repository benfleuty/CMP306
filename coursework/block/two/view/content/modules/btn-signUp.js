$(function () {
    let registerButton = ".btn-signUp";
    $(registerButton).on("click", function (e) {
        e.preventDefault();
        window.location.href = "register.php";
    })
})