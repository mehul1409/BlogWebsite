<?php
session_start();
require 'database.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $is_admin = $_POST['userrole'];

    if (!$firstname) {
        $_SESSION['edit-user'] = "please enter your firstname";
    } elseif (!$lastname) {
        $_SESSION["edit-user"] = "please enter your lastname";
    } else {
        $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', is_admin = $is_admin WHERE id = $id;";
        $query_result = mysqli_query($conn, $query);


        if (mysqli_errno($conn)) {
            $_SESSION['edit-user'] = "failed to edit user";
        } else {
            $_SESSION["edit-user-success"] = "user editted successfully";
            header('location:' . 'dashboard.php');
            die();
        }
    }

    if(isset($_SESSION['edit-user'])){
        header('location:' . 'manage-users.php');
    die();
    }
}else{
    header('location:' . 'manage-users.php');
    die();
}
