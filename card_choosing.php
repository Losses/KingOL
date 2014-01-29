<?php
session_start();
include_once("function.php");
?>
<a id="body_title">Choose a Card!</a>
<div id="body_cards">
    <?php
    $players_count = count(k_db_get("players"));
    $i = 2;
    for ($players_count; $i <= $players_count; $i++) {
        ?>
        <button class="card" onclick="card_check()" value="" ></button>
        <?php
    }
    ?>
</div>
<script>
    s = self.setInterval(function() {
        $('#break_check').load('break_check.php');
    }, refresh_clock);

    function card_check() {
        $.post('card_generation.php', {id: "<?php echo $_SESSION["id"] ?>"}, function() {
            s = window.clearInterval(s);
            $('#index_body').load('king_check.php');
        });
    }
</script>