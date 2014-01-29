<?php
session_start();
include_once("function.php");

if (is_king()) echo "true";
else echo "false";
?>
