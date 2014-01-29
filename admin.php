<?php
session_start();
include_once("function.php");

if (isset($_POST["key"])) {
    $_SESSION["key"] = $_POST["key"];
    header("Location:admin.php");
}

$key = "HelloWorld";
?>
<!doctype HTML>
<head>
    <title>KingOL - Admin Panel</title>
    <script type="text/javascript" src="./template/js/jquery-1.4.min.js"></script>
    <script>
        function god(action) {
            $.post("admin.php", "action=" + action, function() {
                $(".info_error").html(action + "Successfuly");
            });
        }
    </script>
</head>

<body>
    <?php
    //Login Process
    if (isset($_SESSION["key"]) AND $_SESSION["key"] != $key) {
        ?>
        <a class="info_error">Wrong Password!</a>
        <?php
    }

    if ((!isset($_SESSION["key"]) AND !isset($_POST["key"])) OR $_SESSION["key"] != $key) {
        ?>
        <form id="key_fill" action="#" method="post">
            <input name="key" />
        </form>
        <?php
        exit();
    }

    //Action Process
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "start_channel") {
            $channel_new = k_db_get("channel") + 1;
            $content_new = "CHANNEL ID|" . $channel_new;
            unlink("./db/information");
            file_put_contents("./db/information", $content_new, FILE_APPEND);
            mkdir("./db/channel/" . $channel_new);
            file_put_contents("./db/channel/$channel_new/key", md5(gmdate(DATE_RFC822)), FILE_APPEND);
            mkdir("./db/channel/" . $channel_new . "/result");
        } elseif ($_POST["action"] == "start_game") {
            $file_game_start = k_db_get("channel", "folder", "start");
            file_put_contents($file_game_start, FILE_APPEND);
        } elseif ($_POST["action"] == "clear_db") {
            removeDir("db");
            mkdir("db");
            mkdir("./db/channel");
            file_put_contents("./db/.htaccess", "order allow,deny ", FILE_APPEND);
            file_put_contents("./db/.htaccess", "deny from all ", FILE_APPEND);
            file_put_contents("./db/information", "CHANNEL ID|0", FILE_APPEND);
            $channel_new = k_db_get("channel") + 1;
            $content_new = "CHANNEL ID|" . $channel_new;
            unlink("./db/information");
            file_put_contents("./db/information", $content_new, FILE_APPEND);
            mkdir("./db/channel/" . $channel_new);
            file_put_contents("./db/channel/$channel_new/key", md5(gmdate(DATE_RFC822)), FILE_APPEND);
            mkdir("./db/channel/" . $channel_new . "/result");
        }
    }
    ?>
    <a class="info_error"></a>
    <button onclick='god("start_channel");'>Start a New Channel</button>
    <button onclick='god("start_game");'>Start the Game</button>
    <button onclick='god("clear_db");'>Clean the Database</button>
</body>