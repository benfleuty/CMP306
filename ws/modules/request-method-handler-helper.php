<?php

include_once "db-helper.php";

function handle_post($xml)
{
    insert_article($xml);
}