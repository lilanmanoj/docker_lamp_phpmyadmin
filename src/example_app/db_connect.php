<?php
require_once(__DIR__ . '/config.php');

try {
    $con = new mysqli($db_host.":".$db_port, $db_username, $db_password, $db_name);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
} catch (\Throwable $th) {
    echo "Error: (" . $th->getCode() . ") " . $th->getMessage();
    die();
}
?>