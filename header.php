<?php

require './config/database.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">BLOGIFY</a>
        <ul>
            <a href="<?= ROOT_URL?>blog.php">Blog</a>
            <a href="<?= ROOT_URL?>about.php">about</a>
            <a href="<?= ROOT_URL?>services.php">services</a>
            <a href="<?= ROOT_URL?>contact.php">contact</a>
            <a href="<?= ROOT_URL?>signin.php">signin</a>
           <div>
           <img src="./images/avatar1.jpg" alt="">
           </div>
           <div></div>
            <a href="index.php">dashboard</a>
            <a href="logout.php">logout</a>
        </ul>
    </nav>
    
