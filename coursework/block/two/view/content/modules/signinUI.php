<?php ?>
<form class="form-inline m-2 my-lg-0">
    <?php if (isset($_SESSION["user_id"])) : ?>
        <button class="btn btn-info m-1 my-sm-0 btn-basket">Basket</button>
        <button class="btn btn-link my-sm-0 btn-logout">Sign Out</button>
    <?php else: ?>
        <button class="btn btn-info m-1 my-sm-0 btn-login">Sign In</button>
        <button class="btn btn-outline-info m-1 my-sm-0 btn-register">Sign Up</button>
    <?php endif; ?>
</form>