<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <title>Login | Block Two | 1900040</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/register.css">
</head>
<body>
<div class="content">
    <form>
        <div class="mb-3">
            <label for="usernameInput" class="form-label">Username</label>
            <input type="text" class="form-control" id="usernameInput" required aria-required="true">
            <div id="usernameHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" required aria-required="true">
        </div>
        <button id="btnLogin" type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/body-scripts.php"; ?>
<script src="/~1900040/cmp306/coursework/block/two/controller/login-customer.js"></script>

</body>
</html>