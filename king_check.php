<script>
    $(document).ready(function() {
        $('#order').ajaxForm({
            target: '#index_body',
            success: function() {
                t = self.setInterval(function() {
                    window.clearInterval(t);
                    $('#index_body').load('king_check.php');
                }, 1000);
            }
        });
    });
    $('#order').submit(
            function() {
                $(this).ajaxSubmit();
                return false;
            });
</script>
<?php
session_start();
include_once("function.php");
$file_content = file(k_db_get("channel", "folder", "result/0"));
if ($file_content[0] == $_SESSION['id']) {
    if (isset($_GET['order'])) {
        $file_name = k_db_get("channel", "folder", "result/order");
        file_put_contents($file_name, $_GET["order"], FILE_APPEND);
        ?>
        <script>
            window.clearInterval(t);
            $('#index_body').load('wait_select.php');
        </script>
        <?php
    } else {
        ?>
        <a id="index_body_title">You Are The King,Tell me the Order!</a>
        <form action="king_check.php" id="order">
            <input name="order" class="input" />
        </form>
        <?php
    }
} else {
    ?>
    <script>
        window.clearInterval(t);
        var t = self.setInterval(function() {
            $('#index_body').load('wait_select.php');
        }, 1000);
        $('#index_body').load('wait_select.php');
    </script>
    <?php
}
?>