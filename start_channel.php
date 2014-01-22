<?php

include_once("function.php");
$channel_new = k_db_get("channel") + 1;
$content_new = "CHANNEL ID|" . $channel_new;
unlink("./db/information");
file_put_contents("./db/information", $content_new, FILE_APPEND);
mkdir("./db/channel/" . $channel_new);
file_put_contents("./db/channel/$channel_new/key", md5(gmdate(DATE_RFC822)), FILE_APPEND);
mkdir("./db/channel/" . $channel_new . "/result");
header("Location: ./admin.php");