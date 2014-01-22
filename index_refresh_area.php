<?php

include_once("./function.php");
$file_name = k_db_get("channel", "folder", "start");
if (file_exists($file_name)) {
    ?>
    <script>
        $("#name_fill").hide();
        $("#game_waiting").show();
    </script>
    <?php

} else {
    ?>
    <script>
        $("#game_waiting").hide();
        $("#name_fill").show();
    </script>
    <?php

}