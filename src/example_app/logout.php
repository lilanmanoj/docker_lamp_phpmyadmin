<?php
require_once(__DIR__ . '/auth.php');

if (empty($auth)) {
    header("Location: ./index.php");
    exit();
} else {
    session_destroy();
    header("Location: ./index.php");
    exit();
}
?>