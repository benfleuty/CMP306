$(function () {
    $("#btnConfirmCheckout").on("click", function (e) {
        e.preventDefault();
        if (!check_good_card()) {
            alert("Your card is invalid");
            return;
        }

        let cardNum = $("#txtCardNumber").val();
        let sortCode = $("#txtSortCode").val();
        let cvc = $("#txtCVC").val();

        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/model/checkout.php',
            data: {
                cardNum:cardNum,
                sortCode:sortCode,
                cvc:cvc
            },
            success: function (response) {
                console.log(response);
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    })

    function check_good_card() {
        return good_card_num() && good_sort_code() && good_cvc();
    }

    function good_card_num() {
        let cardNum = $("#txtCardNumber").val();
        return !isNaN(parseInt(cardNum)) && cardNum.length === 16;
    }

    function good_sort_code() {
        let sortCode = $("#txtSortCode").val();
        return !isNaN(parseInt(sortCode)) && sortCode.length === 6;
    }

    function good_cvc() {
        let cvc = $("#txtCVC").val();
        return !isNaN(parseInt(cvc)) && cvc.length === 3;
    }
})