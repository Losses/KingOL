<?php
include_once("function.php");
k_head();
?>
<body>
    <div id="index_body">
        <script>
            $(document).ready(function() {
                var options = {
                    target: '#index_body',
                    success: refill
                };
                $('#name_input_form').ajaxForm(options);
            });

            function refresh_wait() {
                $('#index_body').load('wait.php');
            };

            function refill() {
                window.clearInterval(refresh);
                $("#action_refresh").remove();
                self.setInterval(refresh_wait, 1000);
                $('#index_body').load('wait.php');
            }
            ;
        </script>
        <?php
        require ("./template/name_fill.php");
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
