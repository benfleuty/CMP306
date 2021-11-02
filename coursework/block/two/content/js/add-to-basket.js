$(function () {
    $("#btnAddToBasket").on("click", function (e) {
        e.preventDefault();
        let id = e.target.name;
        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/controller/add-to-basket.php',
            data: {
                id: id
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                window.location.href = "/~1900040/cmp306/coursework/block/two/view/basket.php";


            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    })
})