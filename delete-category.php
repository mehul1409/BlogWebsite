<?php 
session_start();
require 'database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];


    $query = "delete from category where id = $id";
    $result = mysqli_query($conn, $query);
    $_SESSION['delete-category-success'] = "category deleted successfully";
}

header("location:" .'manage-categories.php');
die();