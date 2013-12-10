<?php

function k_db_get($item_get, $item_get_mode = "", $item_get_follow = "") {
    if ($item_get == "channel") {
        $file = file("./db/information");
        $channel = explode("|", $file[0]);
        if (isset($item_get_mode) AND $item_get_mode == "folder") {
            if (isset($item_get_follow)) {
                return "./db/channel/" . $channel[1] . "/" . $item_get_follow;
            } else {
                return "./db/channel/" . $channel[1];
            }
        } else {
            return $channel[1];
        }
    } elseif ($item_get == "players") {
        $file = file("./db/information");
        $channel = explode("|", $file[0]);
        $file_name = "./db/channel/" . $channel[1] . "/players";
        $file_content = file($file_name);
        $players = explode("|", $file_content[0]);
        return $players;
    } else {
        return "Error:Item not Found!";
    }
}

function k_head() {
    include_once("./template/head.php");
}

function k_refresh() {
    include_once("./refresh.php");
}

?>