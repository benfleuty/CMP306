$(function(){
    $("#btnRemoveFromBasket").on("click",function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/controller/empty-basket.php',
            success: function (response) {
                window.location.reload();
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    })

    $("#btnCheckout").on("click",function (e) {
        e.preventDefault();
        window.location.href = "/~1900040/cmp306/coursework/block/two/view/checkout.php";
    })
})