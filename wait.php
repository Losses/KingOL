<a id="index_body_title">Waiting for Other Players.</a>
<ul>
    <?php
    $file = file("./db/information");
    $channel = explode("|", $file[0]);
    $info_file_name = "./db/channel/" . $channel[1] . "/start";
    if (!file_exists($info_file_name)) {
        $file_name = "./db/channel/" . $channel[1] . "/players";
        $file_content = file($file_name);
        $players = explode("|", $file_content[0]);
        foreach ($players as $player) {
            ?><li><?php echo $player; ?></li><?php
        }
    } else {
        header("Location: ./game.php");
    }
    ?>
</ul>