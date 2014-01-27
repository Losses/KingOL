<?php

include_once("./function.php");
$file_name = k_db_get("channel", "folder", "start");
if (file_exists($file_name)) {
    echo "0";
} else {
    echo "1";
}