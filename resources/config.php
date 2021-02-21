<?php
//database settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmdb";

$currency = "PKR";
date_default_timezone_set('Asia/Karachi');

//Installation - Include the last slash
$instalation_dir = "http://localhost/theWolfPharmacy/";

ini_set("error_reporting", "true");
error_reporting(E_ALL);

// function console_log($output, $with_script_tags = true)
// {
//     $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
//         ');';
//     if ($with_script_tags) {
//         $js_code = '<script>' . $js_code . '</script>';
//     }
//     echo $js_code;
// }
