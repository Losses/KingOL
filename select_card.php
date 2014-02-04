<?php

session_start();
include_once("function.php");

function find_card($id) {
    $players_count = get_player_count();

    for ($i = 0; $i < $players_count; $i++) {
        $file_card = k_db_get("channel", "folder", "result/") . $i;
        if (file_exists($file_card)) {
            $file_content = file($file_card);
            if ($file_content[0] == $id) return $i;
        }
    }

    return -1;
}

$idx = find_card($_SESSION["id"]);
if ($idx != -1) {
    echo $idx;
    exit();
}

$players_count = get_player_count();
do {
    $file_temp_card = rand(0, $players_count - 1);
    $file_result = k_db_get("channel", "folder", "result/" . $file_temp_card);
} while (file_exists($file_result));
file_put_contents($file_result, $_POST["id"], FILE_APPEND);
echo $file_temp_card;