<?php
include_once("function.php");
k_head();
?>
<body>
    <header>
        <script>
            refresh_clock = 2000;
            $(document).ready(function() {
                $('#name_input_form').submit(function() {
                    $(this).ajaxSubmit({
                        target: '#index_body',
                        success: function() {
                            t = window.clearInterval(t);
                            $("#action_refresh").remove();
                            t = self.setInterval(function() {
                                $('#index_body').load('wait.php');
                            }, refresh_clock);
                            $('#index_body').load('wait.php');
                        }
                    });
                    return false;
                });
            });

            function play_video() {
                var video = $("#header_plr video");
                var flag = $("#header_flag");
                var plr = document.getElementById('plr');
                flag.animate({marginTop: '-15px'}, 100);
                flag.animate({marginTop: '-120px'}, 250);
                video.animate({top: '70px'}, 250);
                video.animate({top: '20px'}, 100);
                plr.play();
            }

            function exit_video() {
                var video = $("#header_plr video");
                var flag = $("#header_flag");
                var plr = document.getElementById('plr');
                plr.pause();
                video.animate({top: '70px'}, 100);
                video.animate({top: '-220px'}, 250);
                flag.animate({marginTop: '-135px'}, 100);
                flag.animate({marginTop: '-20px'}, 250);
            }
            ;
        </script>
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
        <div id="name_fill">
            <a id="body_title">Tell Me Your Name!</a>
            <form id="name_input_form" action="savename.php">
                <input class="input" name="id" />
            </form>
        </div>
        <?php
        require ("./template/wait_gaming.php");
        ?>
    </div>
    <div id="area_refresh">
    </div>
    <div id="action_refresh">
        <?php
        k_refresh("#area_refresh", "./index_refresh_area.php");
        ?>
    </div>
    <script id="action_fill"></script>
    <footer>
        <a href="https://github.com/Losses/KingOL">KingOL</a> is Designed and Programmed by <a href="open.qzworld.net">Losses Don</a>.
    </footer>
</body>
