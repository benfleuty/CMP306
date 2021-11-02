$(function () {
    let loginButton = $("#btnLogin");

    $(loginButton).on("click", function (e) {
        e.preventDefault();
        let uname = $("#usernameInput").val();
        let pword = $("#passwordInput").val();

        if (!uname.length || !pword.length) {
            document.forms[0].reportValidity();
        }

        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/controller/login-user.php',
            data: {
                uname: uname,
                pword: pword
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

                window.location.href = "index.php";
            },
            error: function (a, b, c) {
                console.log(c);
            }
        })
    })

    $('[name="signUp"]').on("click", function (e) {
        e.preventDefault();
        window.location.href = "/~1900040/cmp306/coursework/block/two/view/register.php";
    });
})