var refresh_clock = 2000;
var t, id;

function ask_name() {
    $("#index_body").animate({height: '150px', marginTop: '-75px'});

    check_game_status();
    t = self.setInterval(check_game_status, refresh_clock);

    $('#name_input_form').submit(function() {
        $(this).ajaxSubmit({
            target: '#index_body',
            success: function() {
                t = window.clearInterval(t);

                get_id(function (id_) {
                    id = id_;

                    $("#name_fill").hide();

                    start_check_game_break();
                    wait_players();
                });
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

    t = self.setInterval(function () {
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
}

function card_check() {
    $.post('post_card.php', {id: id}, function() {
        t = window.clearInterval(t);

        $('#choose_card').hide();

        $('#wait_result').show();
        $("#index_body").animate({height: '150px', marginTop: '-75px'});

        get_result(function (is_king) {
            if (is_king) {
                show_king();
            } else {
                wait_result();
            }
        });
    });
}

function get_result(cb) {
    check_status("is_king.php", cb);
}

function show_king() {
    $('#wait_result').hide();
    $('#result_king').show();

    $('#order').submit(function() {
        $(this).ajaxSubmit({
            target: '#index_body',
            success: function() {
                $('#result_king').hide();
                $('#wait_result').show();

                wait_result();
            }
        });
        return false;
    });
}

function wait_result() {
    t = self.setInterval(function () {
        $.get("get_result.php", function (data) {
            if (data != "") {
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

function get_id(cb) {
    $.get("get_id.php", function(data) {
        cb(data);
    });
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
    s = self.setInterval(function () {
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
    if(typeof t == 'undefined') {
        t = window.clearInterval(t);
    }

    $('#index_body').children().hide();
}

$(document).ready(function() {
    ask_name();
});
