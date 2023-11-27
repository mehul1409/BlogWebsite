<?php
session_start();
require 'database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $tittle = $_POST['tittle'];
    $body = $_POST['body'];
    $category_id = $_POST['category'];
    $thumbnail = $_FILES['postthumbnail'];

    if (!$tittle) {
        $_SESSION['add-post'] = "please enter tittle";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "please enter category";
    } elseif (!$body) {
        $_SESSION['add-post'] = "please enter body";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "please add post thumbnail";
    } else {
        $time = time();

        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_temp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = 'userimages/' . $thumbnail_name;

        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_files)) {
            if ($thumbnail['size'] < 3000000) {
                move_uploaded_file($thumbnail_temp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-post'] = 'file size should not exceed 3mb';
            }
        } else {
            $_SESSION['add-post'] = 'file should be png , jpg or jpeg';
        }
    }

    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header("location:" . 'add-post.php');
        die();
    } else {
        $query = "insert into posts (tittle,body,thumbnail,category_id,author_id) values ('$tittle','$body','$thumbnail_name','$category_id' , '$author_id');";
        $result = mysqli_query($conn, $query);

        if (mysqli_errno($conn)) {
            $_SESSION['add-post'] = "failed to add post";
        } else {
            $_SESSION['add-post-success'] = "post added successfully";
            header('location:' . 'dashboard.php');
            die();
        }
    }
}

header("location:" . 'add-post.php');
die();