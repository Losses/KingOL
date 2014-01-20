<?php

function removeDir($dirName) {
    $result = false;
    if (!is_dir($dirName)) {
        trigger_error("ERROR!", E_USER_ERROR);
    }
    $handle = opendir($dirName);
    while (($file = readdir($handle)) !== false) {
        if ($file != '.' && $file != '..') {
            $dir = $dirName . DIRECTORY_SEPARATOR . $file;
            is_dir($dir) ? removeDir($dir) : unlink($dir);
        }
    }
    closedir($handle);
    $result = rmdir($dirName) ? true : false;
    return $result;
}

removeDir("db");
mkdir("db");
mkdir("./db/channel");
file_put_contents("./db/information", "CHANNEL ID|0", FILE_APPEND);
header("Location: ./admin.php");
?>