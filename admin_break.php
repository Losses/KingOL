<?php

include_once("function.php");
$file_game_break = k_db_get("channel", "folder", "break");
file_put_contents($file_game_break, FILE_APPEND);
header("Location: ./admin.php");