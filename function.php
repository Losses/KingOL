<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');

function k_db_get($item_get, $item_get_mode = "", $item_get_follow = "", $location = ".") {
    if ($item_get == "channel") {
        $file = file("$location/db/information");
        $channel = explode("|", $file[0]);
        if (isset($item_get_mode) AND $item_get_mode == "folder") {
            return "$location/db/channel/" . $channel[1] . "/" . $item_get_follow;
        } else {
            return $channel[1];
        }
    } elseif ($item_get == "players") {
        $file = file("$location/db/information");
        $channel = explode("|", $file[0]);
        $file_name = "$location/db/channel/" . $channel[1] . "/players";
        $file_content = file($file_name);
        $players = explode("|", $file_content[0]);
        return $players;
    } else {
        return "Error:Item not Found!";
    }
}

function is_game_start() {
    return file_exists(k_db_get("channel", "folder", "start"));
}

function is_players_exists() {
    return file_exists(k_db_get("channel", "folder", "players"));
}

function get_players() {
    $players = k_db_get("players");
    array_pop($players);
    return $players;
}

function get_player_count() {
    return count(get_players());
}

function is_king() {
    if (is_file(k_db_get("channel", "folder", "result/0"))) {
        $file_content = file(k_db_get("channel", "folder", "result/0"));

        if ($file_content[0] == $_SESSION['id']) return true;
        else return false;
    } else {
        return false;
    }
}
