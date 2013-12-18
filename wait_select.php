<script>
    function load_frame{
        $('#index_body').load('wait_select.php');
    }
    t = self.setInterval(load_frame, 2000);
</script>
<?php
include_once("function.php");
$players_count = count(k_db_get("players"));
$file_name = k_db_get("channel", "folder", "result/order");
$i = 0;
for ($i; $i <= $players_count - 2; $i++) {
    $file_card = k_db_get("channel", "folder", "result") . "/" . $i;
    if (!file_exists($file_card)) {
        require("wait_players.html");
        exit();
    }
}
if (!file_exists($file_name)) {
    require("wait_players.html");
    exit();
}
    header("Location: ./result.php");
?>
