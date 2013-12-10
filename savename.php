<?php

include_once("function.php");
k_head();
session_set_cookie_params(24 * 3600);
session_start();
$_SESSION["id"] = $_GET['ID'];
$file_name = k_db_get("channel", "folder", "players");
$content = $_GET['ID'] . "|";
file_put_contents($file_name, $content, FILE_APPEND);
echo $_SESSION["id"];
header("Location: ./room.php");
?>