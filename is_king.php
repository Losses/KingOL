<?php

session_start();
include_once("function.php");

function is_king() {
    if (is_file(k_db_get("channel", "folder", "result/0"))) {
        $file_content = file(k_db_get("channel", "folder", "result/0"));

        if ($file_content[0] == $_SESSION['id']) return true;
        else return false;
    } else {
        return false;
    }
}

if (is_king()) echo "true";
else echo "false";
?>
