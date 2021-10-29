$(function () {
    $("#btnAddToBasket").on("click", function (e) {
        e.preventDefault();
        let id = e.target.name;
        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/model/add-to-basket.php',
            data: {
                id: id
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                if (jsonData.basket_count > 0)
                    $(".btn-basket").html("Basket (" + jsonData.basket_count + ")");
                else $(".btn-basket").html("Basket");

            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    })
})