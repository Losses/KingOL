<?php
include_once("function.php");
k_head();
?>
<body>
    <div id="index_body">
        <script>
            $(document).ready(function() {
                $('#name_input_form').ajaxForm(
                        function() {
                            $("#action_refresh").empty();
                            $('#index_body').load('wait.php');
                        }
                );
            });
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
</body>