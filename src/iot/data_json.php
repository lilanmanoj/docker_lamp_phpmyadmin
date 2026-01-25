<?php
error_reporting(0);

// Ensure errors are not displayed to the user
ini_set('display_errors', 0);

require_once(__DIR__ . '/db_connect.php');

date_default_timezone_set('Asia/Colombo');

$json_stream = file_get_contents('php://input');
$data = json_decode($json_stream, true);

if (!empty($data)) {
    echo ("Test OK \r\n");
    echo ("Timestamp: " . date("Y-m-d H:i:s e", $data['timestamp']) . "\r\n");
    echo ("RSSI: " . $data['RSSI'] . "\r\n");
    echo ("Device ID: " . $data['device'] . "\r\n");
} else {
    echo ("Invalid data \r\n");
}
?>