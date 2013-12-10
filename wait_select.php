<?php
include_once("function.php");
k_head();
?>
<body>
    <?php
    $players_count = count(k_db_get("players"));
    $file_name = k_db_get("channel", "folder", "result/order");
    $i = 0;
    for ($i; $i <= $players_count - 2; $i++) {
        $file_card = k_db_get("channel", "folder", "result") . "/" . $i;
        if (!file_exists($file_card)) {
            require("wait_players.html");
            k_refresh();
            exit();
        }
    }
    if (!file_exists($file_name)) {
        require("wait_players.html");
        k_refresh();
        exit();
    }
    header("Location: ./result.php");
    ?>
</body>
