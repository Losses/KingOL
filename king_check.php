<script>
    $(document).ready(function() {
        var options = {
            target: '#index_body',
            success: refill
        };
        $('#name_input_form').ajaxForm(options);
    });

    function refresh_wait() {
        $('#index_body').load('king_check.php');
    }
    ;

    function refill() {
        t = self.setInterval(refresh_wait, 1000);
    }
    ;
</script>
<?php
session_start();
include_once("function.php");
$file_content = file(k_db_get("channel", "folder", "result/0"));
if ($file_content[0] == $_SESSION['id']) {
    if (isset($_GET['order'])) {
        $file_name = k_db_get("channel", "folder", "result/order");
        file_put_contents($file_name, $_GET["order"], FILE_APPEND);
        header("Location: ./wait_select.php");
    } else {
        k_head();
        ?>
        <a id="index_body_title">You Are The King,Tell me the Order!</a>
        <form action="king_check.php">
            <input name="order" class="input" />
        </form>
        <?php
    }
} else {
    ?>
    <script>
        window.clearInterval(t);
        $('#index_body').load('wait_select.php');
    </script>
    <?php
}
?>