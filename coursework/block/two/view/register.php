<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <title>Register | Block Two | 1900040</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="content/css/register.css">
</head>
<body>

<div class="content">
    <form>
        <div class="mb-3">
            <label for="firstNameInput" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstNameInput" required aria-required="true">
            <div id="usernameHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="lastNameInput" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastNameInput" required aria-required="true">
            <div id="usernameHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="usernameInput" class="form-label">Username</label>
            <input type="text" class="form-control" id="usernameInput" required aria-required="true">
            <div id="usernameHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" required aria-required="true">
        </div>
        <div class="mb-3">
            <label for="confirmPasswordInput" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPasswordInput" required aria-required="true">
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</div>

<?php include_once "content/modules/body-scripts.php"; ?>

</body>
</html>