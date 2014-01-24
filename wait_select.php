<?php
include_once("function.php");
k_check();

$players_count = count(k_db_get("players"));
$file_name = k_db_get("channel", "folder", "result/order");
$i = 0;
for ($i; $i <= $players_count - 2; $i++) {
    $file_card = k_db_get("channel", "folder", "result") . "/" . $i;
    if (!file_exists($file_card)) {
        require("./template/wait_players.html");
        exit();
    }
}
if (!file_exists($file_name)) {
    require("./template/wait_players.html");
    exit();
}
?>
<script>
    t = window.clearInterval(t);
    $('#index_body').load('result.php');
</script>