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

if (is_king() AND isset($_GET['order'])) {
    $file_name = k_db_get("channel", "folder", "result/order");
    file_put_contents($file_name, $_GET["order"], FILE_APPEND);
}
?>
