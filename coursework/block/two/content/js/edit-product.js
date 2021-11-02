$(function () {
    let titleSel = $("#txtProductTitle")
    let priceSel = $("#txtProductPrice")
    let descSel = $("#txtProductDescription")

    let og_title = titleSel.val();
    let og_price = priceSel.val();
    let og_desc = descSel.val();

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

    $("#btnSaveProduct").on("click", function (e) {
        if (!check_title() || !check_price() || !check_description()) {
            return;
        }

        let title = titleSel.val();
        let price = priceSel.val();
        let desc = descSel.val();
        let id = e.target.name;
        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/controller/edit-product.php',
            data: {
                id:id,
                name:title,
                price:price,
                desc:desc
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                window.location.href = '/~1900040/cmp306/coursework/block/two/view/admin/viewproduct.php?id='+jsonData.id;
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });

    })
    
    $("#btnResetProductForm").on("click",function () {
        titleSel.val(og_title);
        priceSel.val(og_price);
        descSel.val(og_desc);
    })
});