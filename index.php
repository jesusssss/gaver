<?php
$devIpList = array(
    "Rene hjemme" => "178.155.151.10"
);
if(in_array($_SERVER['REMOTE_ADDR'], $devIpList)) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $developer = true;
}
header('Content-type: text/html; charset=utf-8');

session_start();

/* Bootstrap file first */
require_once("bootstrap.php");
require_once("plugin.php");

// Show XML instead
if(isset($_GET["xml"])) {
    if($developer === true) {
        //You are OK
        echo "Xml gonna be here";
    } else {
        echo "You are a very rude person for trying to get here, u know?";
    }
    exit;
}

/* Get requested url */
$url = $_SERVER['REQUEST_URI'];
/* If url contains $_REQUEST value, sort it out */
if (strpos($url,'?') !== false) {
    $url = strstr($url,'?', true);
}

$run = new Plugin($url);