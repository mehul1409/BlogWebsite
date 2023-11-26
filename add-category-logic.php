<?php
session_start();
require 'database.php';

if(isset($_POST['submit'])){
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];

    if(!$tittle){
        $_SESSION['add-category'] = "please add tittle";
    }elseif(!$description){
        $_SESSION['add-category'] = "please add description";
    }

    if(isset($_SESSION["add-category"])){
        $_SESSION['add-category-data'] = $_POST;
        header('location:' . 'add-category.php');
        die();
    }else{
        $query = "insert into category (tittle,description) values ('$tittle','$description')";
        $result = mysqli_query($conn, $query);

        if(mysqli_errno($conn)){
            $_SESSION["add-category"] = "failed to add category";
            header('location:' . 'add-category.php');
            die();
        }else{
            $_SESSION["add-category-success"] = " $tittle category added successfully";
            header('location:' . 'dashboard.php');
            die();
        }
    }
}
