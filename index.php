<?php
include_once("function.php");
k_head();
?>
<?php
$file = file("./db/information");
$channel = explode("|", $file[0]);
$file_name = "./db/channel/" . $channel[1] . "/start";
if (!file_exists($file_name)) {
    ?>

    <body>
        <div id="index_body">
            <a id="index_body_title">Tell Me Your Name!</a>
            <form action="savename.php">
                <input class="input" name="ID" />
            </form>
        </div>
    </body>
    <?php
} else {
    require ("wait_gaming.html");
    k_refresh();
}
?>