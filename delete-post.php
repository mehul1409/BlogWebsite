<?php
session_start();
require 'database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select * from posts where id = $id";
    $result = mysqli_query($conn, $query);
    $postdelete = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1){
        $thumbnail_name = $postdelete['thumbnail'];
        $thumbnail_path = 'userimages/' . $thumbnail_name;

        if($thumbnail_path){
            unlink($thumbnail_path);
        }
    }       

    $delete_post = "delete from posts where id = $id";
    $delete_post_result = mysqli_query($conn,$delete_post);
    if(mysqli_errno($conn)){
        $_SESSION['delete-post'] = "failed to delete '{$postdelete['tittle']}'";
    }else{
        $_SESSION['delete-post-success'] = "'{$postdelete['tittle']}' deleted successfully";
    }
}

header("location:" . 'dashboard.php');  
die();