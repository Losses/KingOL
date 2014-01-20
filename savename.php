<?php

session_start();
include_once("function.php");
session_set_cookie_params(86400);
$key = file(k_db_get("channel", "folder", "key"));
$key = $key[0];
if (isset($_SESSION["channel_kv"]) AND $_SESSION["channel_kv"] == $key) {
    echo $_SESSION["channel_kv"];
    echo $key;
    echo "Cheater";
} else {
    $_SESSION["id"] = $_GET["id"];
    $_SESSION["channel_kv"] = $key;
    $file_name = k_db_get("channel", "folder", "players");
    $content = $_GET["id"] . "|";
    file_put_contents($file_name, $content, FILE_APPEND);
}