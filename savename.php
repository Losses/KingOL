<?php

$password = "ffffff";

session_start();
include_once("function.php");
session_set_cookie_params(86400);
$key = get_channel_key();
if (isset($_SESSION["channel_kv"]) AND $_SESSION["channel_kv"] == $key) {
} else {
    if ($_GET["password"] == $password) {
        $_SESSION["id"] = $_GET["slave"];
        $_SESSION["channel_kv"] = $key;
        $file_name = k_db_get("channel", "folder", "players");
        $content = $_GET["slave"] . "|";
        file_put_contents($file_name, $content, FILE_APPEND);
        echo $_SESSION["id"];
    } else {
        echo "";
    }
}
