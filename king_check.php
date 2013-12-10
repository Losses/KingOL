<?php
session_start();
include_once("function.php");
$file_content = file(k_db_get("channel", "folder", "result/0"));
if ($file_content[0] == $_SESSION['id']) {
    if (isset($_GET['order'])) {
        $file_name = k_db_get("channel", "folder", "result/order");
        file_put_contents($file_name, $_GET["order"], FILE_APPEND);
        header("Location: ./wait_select.php");
    } else {
        k_head();
        ?>
        <body>
            <div id="index_body">
                <a id="index_body_title">You Are The King,Tell me the Order!</a>
                <form action="#">
                    <input name="order" class="input" />
                </form>
            </div>
        </body>
        <?php
    }
} else {
    header("Location: ./wait_select.php");
}
?>