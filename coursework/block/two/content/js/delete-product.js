$(function () {
    $("#btnDeleteProduct").on("click", function (e) {
        e.preventDefault();
        let yes = confirm("Are you sure you want to delete this product?");
        if (!yes) return;

        let id = e.target.name;

        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/controller/delete-product.php',
            data: {
                id:id
            },
            success: function (response) {
                console.log(response);
                let jsonData = JSON.parse(response);
                console.log(jsonData);
                let fail = false;
                if (jsonData.status === "fail") {
                    console.error(jsonData.message);
                    fail = true;
                }

                if (fail) {
                    alert("There was an error and you were not logged in!");
                    return;
                }

                window.location.href = "/~1900040/cmp306/coursework/block/two/view/admin";
            },
            error: function (a, b, c) {
                console.log(c);
            }
        })

    })
})