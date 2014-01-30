<?php
include_once("function.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="./style.css" />
    <script type="text/javascript" src="./js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="./js/jquery.form.min.js"></script>
    <script type="text/javascript" src="./js/video_player.js"></script>
    <script type="text/javascript" src="./js/index_load.js"></script>
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
        <div id="name_fill">
            <a id="body_title">Tell Me Your Name!</a>
            <form id="name_input_form" action="savename.php">
                <input name="slave" class="input"/>
            </form>
        </div>
        <div id="game_waiting">
            <div class="animate-spin icon" id="clock"></div>
            <a id="body_title">You Missed This Round!</a>
        </div>
        <div id="wait_players">
            <a id="body_title">Waiting for Other Players.</a>
            <ul id="body_list"></ul>
            <div class="animate-spin icon" id="clock"></div>
        </div>
        <div id="choose_card">
            <a id="body_title">Choose a Card!</a>
            <div id="body_cards"></div>
        </div>
        <div id="wait_result">
            <div class="animate-spin icon" id="clock"></div>
            <a id="body_title">Waiting for Others.</a>
        </div>
        <div id="result_king">
            <a id="body_title">You Are The King<br />Tell me the Order!</a>
            <form id="order" action="put_king_order.php">
                <input name="order" class="input" />
            </form>
        </div>
        <div id="result">
        </div>
    </div>
    <footer>
        <a href="https://github.com/Losses/KingOL">KingOL</a> is Designed and Programmed by <a href="open.qzworld.net">Losses Don</a>.
    </footer>
</body>
