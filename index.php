<?php
include_once("function.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="./style.css" />
    <script type="text/javascript" src="./template/js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="./template/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="./js/index_load.js"></script>
    <script type="text/javascript" src="./template/js/fuction.js"></script>
    <title>King Online</title>
</head>
<body>
    <header>
        <div id="header_flag" onclick='play_video();'>
            <div id="header_inf" class="icon"></div>
            <div id="header_lft"></div>
            <div id="header_rht"></div>
        </div>
        <div id="header_plr">
            <video src="https://storage.live.com/items/48B3ECBB08E1CFB!1829?filename=shame_play.ogg" controls="controls" ondblclick='exit_video();' id='plr'>
                您正在使用错误的浏览器。
            </video>
        </div>
    </header>
    <div id="index_body">
        <!--Codes to be filled by JS-->
    </div>
    <footer>
        <a href="https://github.com/Losses/KingOL">KingOL</a> is Designed and Programmed by <a href="open.qzworld.net">Losses Don</a>.
    </footer>
</body>
