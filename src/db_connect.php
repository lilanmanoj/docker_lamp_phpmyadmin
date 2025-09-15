<?php
require_once('config.php');

$con = new mysqli($db_host.":".$db_port, $db_username, $db_password, $db_name);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "DB Connected!";
}
?>