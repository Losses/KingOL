refresh_clock = 2000;
$(document).ready(function() {
    $('#index_body').load('name_fill.php', function() {
        t = self.setInterval(function() {
            $.get("index_status.php", function(data) {
                if (data === "0") {
                    // if game is going
                    $("#name_fill").hide();
                    $("#game_waiting").show();
                } else {
                    $("#name_fill").show();
                    $("#game_waiting").hide();
                }
            });
        }, refresh_clock);

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

