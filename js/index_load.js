refresh_clock = 2000;
$(document).ready(function() {
    $('#index_body').load('name_fill.php', function() {
        $.getScript('./js/name_fill.js');
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