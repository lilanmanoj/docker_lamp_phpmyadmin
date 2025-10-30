<?php
$auth = [];

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['employee_id'])) {
    $auth['id'] = $_SESSION['employee_id'];
    $auth['name'] = $_SESSION['name_initials'];
}
?>