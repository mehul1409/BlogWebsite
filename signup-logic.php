<?php

session_start();
require 'database.php';

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $createpassword = $_POST['createpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $avatar = $_FILES['avatar'];

    if(!$firstname){
        $_SESSION['signup'] = "please enter your firstname";
    }elseif(!$lastname){
        $_SESSION["signup"] = "please enter your lastname";
    }elseif(!$username){
        $_SESSION["signup"] = "please enter your username";
    }elseif(!$email){
        $_SESSION["signup"] = "please enter your email";
    }elseif(strlen($createpassword) < 8 || strlen($confirmpassword) < 8){
        $_SESSION["signup"] = "please should be minimum of 8 character";
    }elseif(!$avatar['name']){
        $_SESSION["signup"] = "please add avatar";
    }else{
        if($createpassword !== $confirmpassword){
            $_SESSION["signup"] = "password do not match";
        }else{
           $user_check_query = "select * from users where username = '$username' or email = '$email';";
           $user_check_result = mysqli_query($conn, $user_check_query);

           if(mysqli_num_rows($user_check_result) > 0){
            $_SESSION["signup"] = "username or email already exist";
           }else{
            $time = time();

            $avatar_name = $time.$avatar['name'];
            $avatar_temp_name = $avatar['tmp_name'];
            $avatar_destination_path = 'userimages/'.$avatar_name;

            $allowed_files = ['png','jpg','jpeg'];
            $extension = explode('.', $avatar_name);
            $extension = end($extension);
            if(in_array($extension, $allowed_files)){
                if($avatar['size']<3000000){
                    move_uploaded_file($avatar_temp_name, $avatar_destination_path);
                }else{
                    $_SESSION['signup'] = 'file size should not exceed 3mb';
                }
            }else{
                $_SESSION['signup'] = 'file should be png , jpg or jpeg';
            }
           }
        }
    }

    if(isset($_SESSION['signup'])){
        $_SESSION['signup-data'] = $_POST;
        header('location:' . 'signup.php');
        die();
    }else{
        $insert_query = "insert into users (firstname,lastname,username,email,password,avatar,is_admin) VALUES ('$firstname','$lastname','$username','$email','$createpassword','$avatar_name',0) ;";
        $insert_result = mysqli_query($conn, $insert_query);
        if(!mysqli_errno($conn)){
            $_SESSION['signup-success'] = "registration successfull";
            header('location:' . 'signin.php');
            die();
    }
}

}else{
    header('location:' . 'signup.php');
    die();
}

?>