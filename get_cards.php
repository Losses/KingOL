<?php
include_once("function.php");
$players_count = count(k_db_get("players"));
$i = 2;
for ($players_count; $i <= $players_count; $i++) {
?>
    <button class="card" onclick="card_check()" value="" ></button>
<?php
}
?>
