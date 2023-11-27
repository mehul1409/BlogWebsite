<?php 
session_start();    
require 'database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $user = "select * from users where id = $id";
    $result = mysqli_query($conn,$user);
    $query = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1){
        $avatar_name = $query['avatar'];
        $avatar_path = 'userimages/' . $avatar_name;

        if($avatar_path){
            unlink($avatar_path);
        }
    }

    $thumbnails_query = "select thumbnail from posts where author_id = $id";
    $thumbnail_result = mysqli_query($conn,$thumbnails_query);
    if( mysqli_num_rows($thumbnail_result) > 0){
       while( $thumbnail = mysqli_fetch_assoc($thumbnail_result)){
        $thumbnail_path = 'userimages/'.$thumbnail["thumbnail"];
        if($thumbnail_path){
            unlink($thumbnail_path);
        }
       }
    }

    $delete_user = "delete from users where id = $id";
    $delete_user_result = mysqli_query($conn,$delete_user);
    if(mysqli_errno($conn)){
        $_SESSION['delete-user'] = "failed to delete {$query['username']}";
    }else{
        $_SESSION['delete-user-success'] = "{$query['username']} deleted successfully";
    }
}

header("location:" . 'dashboard.php');
die();