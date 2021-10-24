$(function () {
    let registerButton = ".btn-register";
    $(registerButton).on("click", function (e) {
        e.preventDefault();
        window.location.href = "register.php";
    })
})