<?php

include_once("function.php");
$file_game_start = k_db_get("channel", "folder", "start");
file_put_contents($file_game_start, FILE_APPEND);
header("Location: ./admin.php");
?>