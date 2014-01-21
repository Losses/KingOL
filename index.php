<?php
include_once("function.php");
k_head();
?>
<body>
    <div id="index_body">
        <script>
            refresh_clock = 2000;
            $(document).ready(function() {
                $('#name_input_form').submit(function() {
                    $(this).ajaxSubmit({
                        target: '#index_body',
                        success: function() {
                            t = window.clearInterval(t);
                            $("#action_refresh").remove();
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
        <div id="name_fill">
            <a id="body_title">Tell Me Your Name!</a>
            <form id="name_input_form" action="savename.php">
                <input class="input" name="id" />
            </form>
        </div>
        <?php
        require ("./template/wait_gaming.php");
        ?>
    </div>
    <div id="area_refresh">
    </div>
    <div id="action_refresh">
        <?php
        k_refresh("#area_refresh", "./index_refresh_area.php");
        ?>
    </div>
    <script id="action_fill"></script>
    <footer>
        <a href="https://github.com/Losses/KingOL">KingOL</a> is Designed and Programmed by <a href="open.qzworld.net">Losses Don</a>.
    </footer>
</body>
