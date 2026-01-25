<?php
error_reporting(0);

Ensure errors are not displayed to the user
ini_set('display_errors', 0);

require_once(__DIR__ . '/db_connect.php');

date_default_timezone_set('Asia/Colombo');

$json_stream = file_get_contents('php://input');
$data = json_decode($json_stream, true);

if (!empty($data)) {
    $timestamp = date("Y-m-d H:i:s", $data['timestamp']);

    echo ("Test OK \r\n");
    echo ("Timestamp: " . $timestamp . "\r\n");
    echo ("Temperature: " . $data['temperature'] . "\r\n");
    echo ("Humidity: " . $data['humidity'] . "\r\n");
    echo ("Device ID: " . $data['device'] . "\r\n");

    $query = "INSERT INTO dht11_data (`timestamp`, `device_id`, `temperature`, `humidity`) VALUES (?, ?, ?, ?)";

    $stmt = $con->prepare($query);
    $stmt->bind_param("ssss", $timestamp, $data['device'], $data['temperature'], $data['humidity']);
    $res = $stmt->execute();
} else {
    echo ("Invalid data \r\n");
}
?>