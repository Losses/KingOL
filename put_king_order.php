<?php

session_start();
include_once("function.php");

if (is_king() AND isset($_GET['order'])) {
    $file_name = k_db_get("channel", "folder", "result/order");
    file_put_contents($file_name, $_GET["order"], FILE_APPEND);
}