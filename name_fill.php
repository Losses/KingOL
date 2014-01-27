<div id="name_fill">
    <a id="body_title">Tell Me Your Name!</a>
    <form id="name_input_form" action="savename.php">
        <input class="input" name="id" />
    </form>
</div>

<?php
require ("./template/wait_gaming.php");
?>

<script>
    $(document).ready(function() {
        t = self.setInterval(function() {
            $.get("index_status.php", function(data) {
                if (data === "0") {
                    // if game is going
                    $("#name_fill").hide();
                    $("#game_waiting").show();
                } else {
                    $("#name_fill").show();
                    $("#game_waiting").hide();
                }
            });
        }, refresh_clock);
        $('#name_input_form').submit(function() {
            $(this).ajaxSubmit({
                target: '#index_body',
                success: function() {
                    t = window.clearInterval(t);
                    t = self.setInterval(function() {
                        $('#index_body').load('wait.php');
                    }, refresh_clock);
                    $('#index_body').load('wait.php');
                }
            });
            return false;
        });
    });
</script>