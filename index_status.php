<?php

include_once("./function.php");

function is_game_playing() {
    return file_exists(k_db_get("channel", "folder", "start"));
}

if (is_game_playing()) {
    echo "playing";
} else {
    echo "stopped";
}