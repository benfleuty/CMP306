$(function () {
    $("#btnResetProducts").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/model/restore-database.php',
            success: function (response) {
                window.location.reload();
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    })
})