<?php ?>
<form class="form-inline m-2 my-lg-0">
    <?php if (isset($_SESSION["user_id"])) : ?>
        <span class="user-welcome mx-2"><?= getUserById($_SESSION["user_id"])["username"] ?></span>
        <button class="btn btn-info m-1 my-sm-0 btn-basket">Basket</button>
        <button class="btn btn-link my-sm-0 btn-signOut">Sign Out</button>
    <?php else: ?>
        <button class="btn btn-info m-1 my-sm-0 btn-signIn">Sign In</button>
        <button class="btn btn-outline-info m-1 my-sm-0 btn-signUp">Sign Up</button>
    <?php endif; ?>
</form>