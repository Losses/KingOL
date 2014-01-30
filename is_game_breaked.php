<?php

session_start();
include_once("function.php");

$key = get_channel_key();
if ($key == $_SESSION["channel_kv"])
    echo "false";
else
    echo "true";
