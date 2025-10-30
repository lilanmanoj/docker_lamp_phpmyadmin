<?php
session_start();
require_once(__DIR__ . '/db_connect.php');
require_once(__DIR__ . '/auth.php');

if (empty($auth)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $enc_password = md5($password);

            $sql = $con->prepare("SELECT employee_id, name_initials FROM employees WHERE username = ? AND password = ?");
            $sql->bind_param("ss", $username, $enc_password);
            $sql->execute();
            $result = $sql->get_result();

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['employee_id'] = $row['employee_id'];
                $_SESSION['name_initials'] = $row['name_initials'];
                $_SESSION['error'] = "";
                header("Location: ./dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Invalid username or password.";
                header("Location: ./index.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Please enter username and password.";
            header("Location: ./index.php");
            exit();
        }
    }
} else {
    header("Location: ./dashboard.php");
    exit();
}
?>

<!doctype html>
<html>
    <head>
        <title>UMS - Login</title>
    </head>
    <body>
        <?php include(__DIR__ . '/login_form.php'); ?>
    </body>
</html>