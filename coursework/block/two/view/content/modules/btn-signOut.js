$(function () {
    $(".btn-signOut").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            type:"POST",
            url:"../model/sign-out.php",
            success: function () {
                window.location.href="../view/index.php"
            },
            error: function (a,b,c){
                console.log(c);
            }
        });
    })
})