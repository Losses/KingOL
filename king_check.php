<?php
session_start();
include_once("function.php");
k_check();
?>
<script>
    $(document).ready(function() {
        $('#order').ajaxForm({
            target: '#index_body',
            success: function() {
                s = window.clearInterval(s);
                t = window.clearInterval(t);
                t = self.setInterval(function() {
                    $('#index_body').load('king_check.php');
                }, refresh_clock);
            }
        });

        $("#index_body").animate({
            height: '240px',
            marginTop: '-120px'
        });
    });
    $('#order').submit(
            function() {
                $(this).ajaxSubmit();
                return false;
            });
            
    s = self.setInterval(function() {
        $('#break_check').load('break_check.php');
        }, refresh_clock);
        $('#break_check').load('break_check.php');
</script>
<?php
if (is_file(k_db_get("channel", "folder", "result/0"))) {
    $file_content = file(k_db_get("channel", "folder", "result/0"));
} else {
    $file_content[0] = "";
}
if ($file_content[0] == $_SESSION['id']) {
    if (isset($_GET['order'])) {
        $file_name = k_db_get("channel", "folder", "result/order");
        file_put_contents($file_name, $_GET["order"], FILE_APPEND);
        ?>
        <script>
            t = window.clearInterval(t);
            $('#index_body').load('wait_select.php');
        </script>
        <?php
    } else {
        ?>
        <a id="body_title">You Are The King<br />Tell me the Order!</a>
        <form action="king_check.php" id="order">
            <input name="order" class="input" />
        </form>
        <?php
    }
} else {
    ?>
    <script>
        t = window.clearInterval(t);
        t = self.setInterval(function() {
            $('#index_body').load('wait_select.php');
        }, refresh_clock);
        $('#index_body').load('wait_select.php');
    </script>
    <?php
}