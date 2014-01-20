<?php session_start(); ?>
<script>
    $(document).ready(function() {
        $('#order').ajaxForm({
            target: '#index_body',
            success: function() {
                t = self.setInterval(function() {
                    window.clearInterval(t);
                    $('#index_body').load('king_check.php');
                }, refresh_clock);
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
include_once("function.php");
if (is_file(k_db_get("channel", "folder", "result/0"))) {
    $file_content = file(k_db_get("channel", "folder", "result/0"));
} else {
    $file_content[0]="";
}
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
        }, refresh_clock);
        $('#index_body').load('wait_select.php');
    </script>
    <?php
}
?>