<?php
include_once("function.php");
$players = k_db_get("channel", "folder", "players");
if (!file_exists($players)) {
    echo "true";
} else {
    echo "false";
}
?>
