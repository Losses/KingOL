<?php
include_once("function.php");

$players = get_players();
foreach ($players as $player) {
?><li><?php echo $player; ?></li><?php
}
?>
