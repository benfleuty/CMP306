<?php ?>

<?php include_once __DIR__ . "/body-scripts.php"; ?>
<script src="content/modules/btn-signIn.js"></script>
<script src="content/modules/btn-signUp.js"></script>
<script src="content/modules/btn-signOut.js"></script>
<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="/~1900040/cmp306/coursework/block/two/">B&Cue</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../view/">Home</a>
                </li>
                <?php if (isset($_SESSION["user_id"]) && isSpecialUserByID($_SESSION["user_id"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin.php">Admin Panel</a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php require __DIR__ . "/signInUI.php"; ?>
        </div>
    </nav>
</header>
