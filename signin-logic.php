<?php
session_start();
require 'database.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$username) {
        $_SESSION['signin'] = "please enter your username or email";
    } elseif (!$password) {
        $_SESSION["signin"] = "please enter your password";
    } else {
        $check_query = "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt = mysqli_prepare($conn, $check_query);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $username);
        mysqli_stmt_execute($stmt);
        $check_result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($check_result) == 1) {
            $user_record = mysqli_fetch_array($check_result);
            $db_password = $user_record["password"];

            if ($db_password == $password) {
                $_SESSION['user-id'] = $user_record['id'];
                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user_isadmin'] = true;
                }
                header('location:' . 'dashboard.php');
            } else {
                $_SESSION['signin'] = "please check your input";
            }
        } else {
            $_SESSION['signin'] = "user not found";
        }
    }
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location:' . 'signin.php');
    }
} else {
    header('location: signin.php');
    die();
}
?>
