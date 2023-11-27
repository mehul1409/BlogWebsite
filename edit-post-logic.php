<?php
session_start();
require 'database.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tittle = $_POST['tittle'];
    $body = $_POST['body'];
    $category = $_POST['category'];

    if (!$tittle) {
        $_SESSION['edit-post'] = "please enter tittle";
    } elseif (!$body) {
        $_SESSION["edit-post"] = "please enter body";
    } else {
        $query = "UPDATE posts SET tittle = '$tittle', body = '$body' , category_id = '$category' WHERE id = $id;";
        $query_result = mysqli_query($conn, $query);


        if (mysqli_errno($conn)) {
            $_SESSION['edit-post'] = "failed to edit post";
        } else {
            $_SESSION["edit-post-success"] = "post editted successfully";
            header('location:' . 'dashboard.php');
            die();
        }
    }

    if (isset($_SESSION['edit-post'])) {
        header('location:' . 'manage-post.php');
        die();
    }
} else {
    header('location:' . 'manage-post.php');
    die();
}
