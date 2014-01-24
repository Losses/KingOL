<?php

include_once("./function.php");
$file_name = k_db_get("channel", "folder", "start");
if (file_exists($file_name)) {
    ?>
    <script>
        $(document).ready(function() {
            $("#name_fill").hide();
            $("#game_waiting").show();
        });
    </script>
    Status - A
    <?php

} else {
    ?>
    <script>
        $(document).ready(function() {
            $("#name_fill").show();
            $("#game_waiting").hide();
        });
    </script>
    Status - B
    <?php

}