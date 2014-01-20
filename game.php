<?php
session_start();
include_once("function.php");
?>
<script>
    function card_check() {
        $.post('card_generation.php',
                {
                    id: "<?php echo $_SESSION["id"] ?>"
                }
        );
        $('#index_body').load('king_check.php');
    }
</script>
<a id="index_body_title">Choose a Card!</a>
<?php
$players_count = count(k_db_get("players"));
$i = 2;
for ($players_count; $i <= $players_count; $i++) {
    ?>
    <button class="card" onclick="card_check()" value="" />
    <?php
}
?>