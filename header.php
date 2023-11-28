<?php
session_start();
require 'database.php';

if(isset($_SESSION['user-id'])){
    $id = $_SESSION['user-id'];
    $fetch_user = "SELECT avatar FROM users WHERE id = '$id';";
    $fetch_user_result = mysqli_query($conn,$fetch_user);
    $avatar = mysqli_fetch_assoc($fetch_user_result);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <a href="index.php" class="logo">BLOGIFY</a>
        <ul class="navbar">
            <a href="blog.php">Blog</a>
            <a href="about.php">about</a>
            <a href="services.php">services</a>
            <a href="contact.php">contact</a>
            <?php if (isset($_SESSION['user-id'])): ?>
                <div>
                    <img class="profilepic" src="<?= 'userimages/'.$avatar['avatar'] ?>" alt="profile picture">
                </div>
                <div></div>
                <a href="dashboard.php">dashboard</a>
                <a href="logout.php">logout</a>
            <?php else: ?>
                <a href="signin.php">signin</a>
            <?php endif ?>
        </ul>
    </nav>