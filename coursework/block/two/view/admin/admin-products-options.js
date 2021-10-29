$(function () {
    let action = null;
    let selected_product_id = -1;

    $("button").on("click", function (e) {
        e.preventDefault();
    })

    $(".btn-data-action").on("click", function (e) {
        e.preventDefault();
        let vals = e.target.name.split('-');
        let action = vals[0];
        selected_product_id = vals[1];

        do_action(action);
    })

    function do_action(action) {
        switch (action) {
            case "view":
                window.location.href = "/~1900040/cmp306/coursework/block/two/view/admin/viewproduct.php?id=" + selected_product_id;
                break;
            case "edit":
                window.location.href = "/~1900040/cmp306/coursework/block/two/view/admin/editproduct.php?id=" + selected_product_id;
                break;
            case "delete":
                window.location.href = "/~1900040/cmp306/coursework/block/two/view/admin/deleteproduct.php?id=" + selected_product_id;
                break;

            default:console.error("error doing action");
        }
    }
});