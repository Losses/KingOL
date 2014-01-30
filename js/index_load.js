var refresh_clock = 2000;
var t, id;

function ask_name() {
    $("#index_body").animate({height: '150px', marginTop: '-75px'});

    check_game_status();
    t = self.setInterval(check_game_status, refresh_clock);

    var obj = $('#name_input_form');
    obj.submit(function() {
        obj.ajaxSubmit({
            success: function(data) {
                t = window.clearInterval(t);

                id = data;

                obj.unbind("submit");
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

    refresh_players_list();
    t = self.setInterval(function() {
        refresh_players_list();
        check_game_started(function (started) {
            if (started) {
                t = window.clearInterval(t);
                $('#wait_players').hide();
                choose_card();
            }
        });
    }, refresh_clock);
}

function refresh_players_list() {
    $('#wait_players>#body_list').load('get_players.php');
}

function choose_card() {
    $('#choose_card').show();
    $('#body_cards').load('get_cards.php');
    $('#body_cards').delegate('button', 'click', select_card);
}

function select_card() {
    $('#body_cards').undelegate('button', 'click');

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

    var obj = $('#order');
    obj.submit(function() {
        obj.ajaxSubmit({
            success: function() {
                obj.unbind("submit");

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

    refresh_result();
    t = self.setInterval(refresh_result, refresh_clock);
}

function refresh_result() {
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
