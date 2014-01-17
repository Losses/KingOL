<?php
include_once("function.php");
k_head();
?>
<body>
    <div id="index_body">
        <script>
            $(document).ready(function() {
                $('#name_input_form').ajaxForm({
                    target: '#index_body',
                    success: function() {
                        window.clearInterval(t);
                        $("#action_refresh").remove();
                        t = self.setInterval(function() {
                            $('#index_body').load('wait.php');
                        }, 1000);
                        $('#index_body').load('wait.php');
                    }
                });
            });
        </script>
        <div id="name_fill">
            <a id="index_body_title">Tell Me Your Name!</a>
            <form id="name_input_form" action="savename.php">
                <input class="input" name="ID" />
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
</body>
