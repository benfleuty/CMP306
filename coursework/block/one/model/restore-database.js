$(function () {
    $("#btnRestoreDatabase").on("click", function () {
        $.ajax({
            type: "POST",
            url: '../model/restore-database.php',
            success: function (response) {
                var jsonData = JSON.parse(response);
                let fail = false;

                if (jsonData.drop_status === 'success'){
                    if (jsonData.fill_status !== 'success') {
                        console.error("Restore error: Error inserting items!");
                        fail = true;
                    }
                } else {
                    console.error("Restore error: Error dropping items!");
                    fail = true;
                }

                if (fail) return;

                location.reload();


            }
        })
    })
})