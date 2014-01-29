<?php
include_once("function.php");
k_check();
?>
<script>
    $("#index_body").animate({
        height: '440px',
        marginTop: '-220px'
    });

</script>
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
<script>
    t = window.clearInterval(t);
    t = self.setInterval(function() {
        $('#index_body').load('result.php');
    }, refresh_clock);
</script>