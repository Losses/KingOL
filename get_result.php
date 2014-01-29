<?php

include_once("function.php");

function is_all_player_select_complete() {
    $players_count = count(k_db_get("players"));
    for ($i = 0; $i <= $players_count - 2; $i++) {
        $file_card = k_db_get("channel", "folder", "result") . "/" . $i;
        if (!file_exists($file_card)) return false;
    }

    return true;
}

function is_order_put_complete() {
    $file_name = k_db_get("channel", "folder", "result/order");
    return file_exists($file_name);
}

if (!is_all_player_select_complete() OR !is_order_put_complete()) {
    echo "";
    exit();
}

?>
<a id="body_title" name="index_body_title">Result.</a>
<ul id="body_list">
    <?php
    $players_count = count(k_db_get("players")) - 1;
    for ($i = 0; $i < $players_count; $i++) {
        $file_card = k_db_get("channel", "folder", "result/") . $i;
        $file_content = file($file_card);
        if ($i == 0) {
            $num = "";
        } else {
            $num = $i;
        }
        ?>

        <li>
            <a class="result_num"><?php echo $num; ?></a>
            <a class="result_name"><?php echo $file_content[0]; ?></a>
        </li>

        <?php
    }
    $order = file(k_db_get("channel", "folder", "/result/order"));
    ?>
</ul>
<div id="result_order">
    King's Order:<br />
    <?php echo $order[0]; ?>
</div>
