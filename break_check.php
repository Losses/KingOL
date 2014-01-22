<?php

$file = file("./db/information");
$channel = explode("|", $file[0]);
$channel = $channel[1] - 1;
$break_file = "./db/channel/" . $channel . "/break";
if (file_exists($break_file)) {
    ?>
    <script>
        window.location.reload();
    </script>
    <?php

}