<?php

include("include/config.php");
include("include/exec.php");

try { if (file_exists($LOG_FILE_NAME)) { unlink($LOG_FILE_NAME); } } catch (Exception $e) { }

$command = stripslashes($_POST['command']);
$pid = executeBackgroundCommand($command, $FFMPEG_FOLDER, $LOG_FILE_NAME);

file_put_contents($PID_FILE_NAME, $pid);

header("Location: status.php");

?>
