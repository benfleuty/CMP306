$(function () {
    let loginButton = ".btn-signIn";
    $(loginButton).on("click", function (e) {
        e.preventDefault();
        window.location.href = "login.php";
    })
})