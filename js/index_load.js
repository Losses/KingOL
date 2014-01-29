refresh_clock = 2000;

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

function check_game_status() {
    $.get("index_status.php", function(data) {
        if (data === "playing") {
            // if game is going
            $("#name_fill").hide();
            $("#game_waiting").show();
        }
        if (data === "stopped") {
            $("#name_fill").show();
            $("#game_waiting").hide();
        }
    });
}

function ask_name() {
    $('#index_body').load('name_fill.php', function () {
        $('#name_input_form').submit(function() {
            $(this).ajaxSubmit({
                target: '#index_body',
                success: function() {
                    $("#index_body").animate({
                        height: '400px',
                        marginTop: '-200px'
                    });
                    t = window.clearInterval(t);
                    t = self.setInterval(function() {
                        $('#index_body').load('wait.php');
                    }, refresh_clock);
                }
            });
            return false;
        });

        t = self.setInterval(check_game_status, refresh_clock);
    });
}

$(document).ready(function() { ask_name(); });
