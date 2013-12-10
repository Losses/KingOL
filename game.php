<?php
include_once("function.php");
k_head();
?>
<body>
    <div id="game_body">
        <a id="index_body_title">Choose a Card!</a>
        <?php
        $players_count = count(k_db_get("players"));
        $i = 2;
        for ($players_count; $i <= $players_count; $i++) {
            ?>
            <form action="card_generation.php" class="card_form">
                <input type="submit" value="" class="card"/>
            </form>
            <?php
        }
        ?>
    </div>
</body>