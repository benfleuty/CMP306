<?php

$special = false;

if (isset($_SESSION['user_id'])) {
    $decoded = json_decode(isSpecialUserByID($_SESSION['user_id']), true);
    $special = $decoded['special'];
}


if (!$special) {
    header('Location: /~1900040/cmp306/coursework/block/two/view/index.php');
}