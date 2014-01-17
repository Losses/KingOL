<?php
include_once("function.php");
$file_name = k_db_get("channel", "folder", "start");
if (file_exists($file_name)) {
    ?>
    <a id="index_body_title" name="index_body_title">Result.</a>
    <ul>
        <?php
        $players_count = count(k_db_get("players")) - 1;
        for ($i = 0; $i < $players_count; $i++) {
            $file_card = k_db_get("channel", "folder", "result/") . $i;
            $file_content = file($file_card);
            if ($i == 0) {
                $num = "K";
            } else {
                $num = $i;
            }
            ?>

            <li><a class="result_num"><?php
                    echo $num;
                    ?></a> <a class="result_name"><?php
                    echo $file_content[0];
                    ?></a></li><?php
            }
            $order = file(k_db_get("channel", "folder", "/result/order"));
            ?>

        <li>
            <a class="result_order">
                King's Order:<br />
                <?php echo $order[0]; ?>
            </a>
        </li>
    </ul>
    <script>
        window.clearInterval(t);
        t = self.setInterval(function() {
            $('#index_body').load('result.php');
        }, 1000);
    </script>
    <?php
} else {
    ?>
    <script>
        window.clearInterval(t);
        window.location.reload();
    </script>
    <?php
}