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
        <?php
        require("./template/index_refresh_area.php");
        ?>
    </div>
</body>