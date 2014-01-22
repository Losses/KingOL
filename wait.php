<?php
include_once("function.php");
?>
<script>
    $("#index_body").animate({
        height: '400px',
        marginTop: '-200px'
    });
</script>
<a id="body_title">Waiting for Other Players.</a>
<ul id="body_list">
    <?php
    $start = k_db_get("channel", "folder", "start");
    if (!file_exists($start)) {
        $players = k_db_get("players");
        foreach ($players as $player) {
            ?><li><?php echo $player; ?></li><?php
        }
    } else {
        ?>
        <script>
            t = window.clearInterval(t);
            $('#index_body').load('game.php');
        </script>
        <?php
    }
    ?>
</ul>