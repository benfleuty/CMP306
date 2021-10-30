$(function () {
    $("#btnConfirmCheckout").on("click", function (e) {
        e.preventDefault();
        if (!check_good_card()) {
            alert("Your card is invalid");
            return;
        }

        let cardNum = $("#txtCardNumber").val();
        let amount = $("#price").html();

        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/model/aberpay.php',
            data: {
                amount: amount,
                card: cardNum
            },
            success: function () {
                window.location.href = '/~1900040/cmp306/coursework/block/two/view/order-confirmation.php';
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    })

    function check_good_card() {
        return good_card_num();
    }

    function good_card_num() {
        let cardNum = $("#txtCardNumber").val();
        return !isNaN(parseInt(cardNum)) && cardNum.length === 16;
    }
})