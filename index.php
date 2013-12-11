<?php
include_once("function.php");
k_head();
?>
<body>
    <div id="index_body">
        <?php
        require ("./template/name_fill.php");
        require ("./template/wait_gaming.php");
        ?>
    </div>
    <div id="area_refresh">
    </div>
    <?php
    k_refresh("#area_refresh", "./index_refresh_area.php");
    ?>
</body>