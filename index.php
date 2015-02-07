<?php
use plugin\User;

$devIpList = array(
    "Rene hjemme" => "178.155.151.10"
);
if(in_array($_SERVER['REMOTE_ADDR'], $devIpList)) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $GLOBALS["developer"] = true;
}
header('Content-type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Copenhagen');
session_start();

/* Bootstrap file first */
require_once("bootstrap.php");
require_once("plugin.php");

/* Get requested url */
$url = $_SERVER['REQUEST_URI'];
/* If url contains $_REQUEST value, sort it out */
if (strpos($url,'?') !== false) {
    $url = strstr($url,'?', true);
}

/* Init debug */
function debug_r($output) {
    if($GLOBALS["developer"] === true ) {
        $date = date('d-m-Y H:i:s');
        echo "<pre>";
        echo "<strong>Debug statement [".$date."]</strong>: <br/>";
        print_r($output);
        echo "<br/>";
        echo "----------------------------------------------------------------";
        echo "</pre>";
    }
}
function debug($output) {
    if($GLOBALS["developer"] === true ) {
        $date = date('d-m-Y H:i:s');
        echo "<pre>";
        echo "<strong>Debug statement [".$date."]</strong>: <br/>";
        if(is_array($output)) {
            print_r($output);
        } else {
            print($output);
        }
        echo "<br/>";
        echo "----------------------------------------------------------------";
        echo "</pre>";
    }
}
$bs = new Bootstrap();
if(\Bootstrap::$theme != "admin") {
    $run = new Plugin($url);
} else {
    $run = new Plugin();
}
$user = new User();





