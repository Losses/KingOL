<?php

include_once("function.php");
$players_count = count(k_db_get("players"));
do {
    $file_temp_card = rand(0, $players_count - 2);
    $file_result = k_db_get("channel", "folder", "result/" . $file_temp_card);
} while (file_exists($file_result));
file_put_contents($file_result, $_POST["id"], FILE_APPEND);
