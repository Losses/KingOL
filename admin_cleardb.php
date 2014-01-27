<?php



removeDir("db");
mkdir("db");
mkdir("./db/channel");
file_put_contents("./db/.htaccess", "order allow,deny ", FILE_APPEND);
file_put_contents("./db/.htaccess", "deny from all ", FILE_APPEND);
file_put_contents("./db/information", "CHANNEL ID|0", FILE_APPEND);
header("Location: ./start_channel.php");
?>