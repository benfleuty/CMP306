$(function () {
    let titleSel = $("#txtProductTitle")
    let priceSel = $("#txtProductPrice")
    let descSel = $("#txtProductDescription")

    $("button").on("click", function (e) {
        e.preventDefault();
    });

    function check_title() {
        let title = titleSel.val();
        title = title.trim();
        if (title.length < 1) {
            alert("You need to enter a title!");
            return false;
        }

        return true;
    }

    function check_price() {
        let price = priceSel.val();
        price = price.trim();
        if (price.length < 1) {
            alert("You need to enter a price!");
            return false;
        }

        if (isNaN(parseFloat(price))) {
            alert("You need to enter a valid price!");
            return false;
        }

        return true;
    }

    function check_description() {
        let desc = descSel.val();
        desc = desc.trim();
        if (desc.length < 1) {
            alert("You need to enter a description!");
            return false;
        }
        return true;
    }

    $("#btnSaveNewProduct").on("click", function (e) {
        if (!check_title() || !check_price() || !check_description()) {
            return;
        }

        let title = titleSel.val();
        let price = priceSel.val();
        let desc = descSel.val();

        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/controller/new-product.php',
            data: {
                name: title,
                price: price,
                desc: desc
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                if (jsonData.get_id_status === "success")
                    window.location.href = '/~1900040/cmp306/coursework/block/two/view/admin/viewproduct.php?id=' + jsonData.id;
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });

    })

    $("#btnResetProductForm").on("click", function () {
        titleSel.val("");
        priceSel.val("");
        descSel.val("");
    })
});