<?php
include_once '/home/1900040/public_html/cmp306/coursework/block/two/content/modules/body-scripts.php';

$special = false;
if (isset($_SESSION['user_id'])) {
    $special = json_decode(isSpecialUserByID($_SESSION["user_id"]), true)["special"];
}
?>

    <script src="/~1900040/cmp306/coursework/block/two/content/js/btn-signIn.js"></script>
    <script src="/~1900040/cmp306/coursework/block/two/content/js/btn-signUp.js"></script>
    <script src="/~1900040/cmp306/coursework/block/two/content/js/btn-signOut.js"></script>
    <script src="/~1900040/cmp306/coursework/block/two/content/js/open-basket.js"></script>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="/~1900040/cmp306/coursework/block/two/">Bee&Cue</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/~1900040/cmp306/coursework/block/two/view/">Home</a>
                    </li>
                    <?php if ($special) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/~1900040/cmp306/coursework/block/two/view/admin">Admin Panel</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php require "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/signInUI.php"; ?>
            </div>
        </nav>
    </header>