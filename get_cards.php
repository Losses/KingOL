<?php
include_once("function.php");
$players_count = get_player_count();
for ($i=0; $i < $players_count; $i++) {
?>
    <button class="card" onclick="card_check()" value="" ></button>
<?php
}
?>
