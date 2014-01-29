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

function k_check() {
    $players = k_db_get("channel", "folder", "players");
    if (!file_exists($players)) {
        ?><script>
            if (typeof s !== "undefined") {
                s = window.clearInterval(s);
            }
            t = window.clearInterval(t);
            $("#index_body").animate({height: '150px', marginTop: '-75px'});
            $('#index_body').load('name_fill.php');
            $.getScript('./js/name_fill.js');
        </script><?php
        exit();
    }
}

function removeDir($dirName) {
    $result = false;
    if (!is_dir($dirName)) {
        trigger_error("ERROR!", E_USER_ERROR);
    }
    $handle = opendir($dirName);
    while (($file = readdir($handle)) !== false) {
        if ($file != '.' && $file != '..') {
            $dir = $dirName . DIRECTORY_SEPARATOR . $file;
            is_dir($dir) ? removeDir($dir) : unlink($dir);
        }
    }
    closedir($handle);
    $result = rmdir($dirName) ? true : false;
    return $result;
}
