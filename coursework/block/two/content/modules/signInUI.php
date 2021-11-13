<?php
include_once '/home/1900040/public_html/cmp306/coursework/block/two/content/modules/header.php';


?>
<form class="form-inline m-2 my-lg-0">
    <?php if (isset($_SESSION["user_id"])) :
        $user = getUserById($_SESSION['user_id']);
        $user = json_decode($user, true);
        $user = $user["user"];

        $basket = "Basket";
        if (isset($_SESSION["basket"])) {
            $basket .= " (1)";
        }
        ?>
        <span class="user-welcome mx-2"><?= $user["username"] ?></span>
        <button class="btn btn-info m-1 my-sm-0 btn-basket"><?= $basket ?></button>
        <button class="btn btn-link my-sm-0 btn-signOut">Sign Out</button>
    <?php else: ?>
        <button class="btn btn-info m-1 my-sm-0 btn-signIn">Sign In</button>
        <button class="btn btn-outline-info m-1 my-sm-0 btn-signUp">Sign Up</button>
    <?php endif; ?>
</form>