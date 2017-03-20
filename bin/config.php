<?php

if(!file_exists(__DIR__."/data")){
    mkdir(__DIR__."/data");
}

if(!file_exists(__DIR__."/data/logs")){
    mkdir(__DIR__."/data/logs");
}

$DATA_PATH = __DIR__ . "/data/cookies.dat";
$ERROR_PATH = __DIR__ . "/data/logs/err.log";
$LOG_PATH = __DIR__ . "/data/logs/info.log";

if(!file_exists($DATA_PATH)){
    touch($DATA_PATH);
}
if(!file_exists($ERROR_PATH)){
    touch($ERROR_PATH);
}
if(!file_exists($LOG_PATH)){
    touch($LOG_PATH);
}
    
$LOGIN = "root";
$PASSWORD = "toor";

?>

