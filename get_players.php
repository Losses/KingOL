<?php
include_once("function.php");

$players = k_db_get("players");
foreach ($players as $player) {
?><li><?php echo $player; ?></li><?php
}
?>
