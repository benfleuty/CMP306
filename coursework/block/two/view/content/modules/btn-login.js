$(function () {
    let loginButton = ".btn-login";
    $(loginButton).on("click", function (e) {
        e.preventDefault();
        window.location.href = "login.php";
    })
})