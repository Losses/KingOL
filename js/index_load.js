var refresh_clock = 2000;
var t, id;

function ask_name() {
    $("#index_body").animate({height: '150px', marginTop: '-75px'});

    check_game_status();
    t = self.setInterval(check_game_status, refresh_clock);

    $('#name_input_form').submit(function() {
        $(this).ajaxSubmit({
            success: function(data) {
                t = window.clearInterval(t);

                id = data;

                $("#name_fill").hide();

                start_check_game_break();
                wait_players();
            }
        });
        return false;
    });
}

function wait_players() {
    $('#wait_players').show();
    $("#index_body").animate({
        height: '400px',
        marginTop: '-200px'
    });

    t = self.setInterval(function() {
        $('#wait_players>#body_list').load('get_players.php');
        check_game_started(function (started) {
            if (started) {
                t = window.clearInterval(t);
                $('#wait_players').hide();
                choose_card();
            }
        });
    }, refresh_clock);
}

function choose_card() {
    $('#choose_card').show();
    $('#body_cards').load('get_cards.php');
    $('#body_cards').delegate('button', 'click', select_card);
}

function select_card() {
    $.post('select_card.php', {"id": id}, function(data) {
        t = window.clearInterval(t);

        $('#choose_card').hide();

        var is_king = data === "0";
        if (is_king) {
            show_king();
        } else {
            wait_result();
        }
    });
}

function show_king() {
    $('#result_king').show();
    $("#index_body").animate({height: '240px', marginTop: '-120px'});

    $('#order').submit(function() {
        $(this).ajaxSubmit({
            success: function() {
                $('#result_king').hide();

                wait_result();
            }
        });
        return false;
    });
}

function wait_result() {
    $('#wait_result').show();
    $("#index_body").animate({height: '150px', marginTop: '-75px'});

    t = self.setInterval(function() {
        $.get("get_result.php", function (data) {
            if (data !== "") {
                t = window.clearInterval(t);

                $('#wait_result').hide();

                $('#result').html(data);
                $('#result').show();
                $("#index_body").animate({
                    height: '440px',
                    marginTop: '-220px'
                });
            }
        });
    }, refresh_clock);
}

function check_game_status() {
    check_game_started(function (started) {
        if (started) {
            // if game is going
            $("#name_fill").hide();
            $("#game_waiting").show();
        } else {
            $("#name_fill").show();
            $("#game_waiting").hide();
        }
    });
}

function check_game_started(cb) {
    check_status("is_game_started.php", cb);
}

function check_game_breaked(cb) {
    check_status("is_game_breaked.php", cb);
}

function check_status(url, cb) {
    $.get(url, function(data) {
        if (data === "true") {
            cb(true);
        } else { // "false"
            cb(false);
        }
    });
}

function start_check_game_break() {
    var s;
    s = self.setInterval(function() {
        check_game_breaked(function (isBreaked) {
            if (isBreaked) {
                self.clearInterval(s);

                reset_game();
                ask_name();
            }
        });
    }, refresh_clock);
}

function reset_game() {
    if(typeof t !== 'undefined') {
        t = window.clearInterval(t);
    }

    $('#index_body').children().hide();
}

$(document).ready(function() {
    ask_name();
});
