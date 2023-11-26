<?php
session_start();
require 'database.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];

    if (!$tittle) {
        $_SESSION['edit-category'] = "please enter tittle";
    } elseif (!$description) {
        $_SESSION["edit-category"] = "please enter description";
    } else {
        $query = "UPDATE category SET tittle = '$tittle', description = '$description' WHERE id = $id;";
        $query_result = mysqli_query($conn, $query);


        if (mysqli_errno($conn)) {
            $_SESSION['edit-category'] = "failed to edit category";
        } else {
            $_SESSION["edit-category-success"] = "category editted successfully";
            header('location:' . 'dashboard.php');
            die();
        }
    }

    if(isset($_SESSION['edit-category'])){
        header('location:' . 'manage-categories.php');
    die();
    }
}else{
    header('location:' . 'manage-categories.php');
    die();
}
