


<?php
session_start();

$firstname = isset($_SESSION['signup-data']['firstname']) ? $_SESSION['signup-data']['firstname'] : '';
$lastname = isset($_SESSION['signup-data']['lastname']) ? $_SESSION['signup-data']['lastname'] : '';
$username = isset($_SESSION['signup-data']['username']) ? $_SESSION['signup-data']['username'] : '';
$email = isset($_SESSION['signup-data']['email']) ? $_SESSION['signup-data']['email'] : '';
$createpassword = isset($_SESSION['signup-data']['createpassword']) ? $_SESSION['signup-data']['createpassword'] : '';
$confirmpassword = isset($_SESSION['signup-data']['confirmpassword']) ? $_SESSION['signup-data']['confirmpassword'] : '';
unset($_SESSION['signup-data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .signup {
            text-align: center;
            margin: 20px auto;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup h2 {
            color: #333;
        }

        .signup-form {
            text-align: left;
        }

        .signup-form input,
        .signup-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .signup-form input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }

        .signup a {
            color: #333;
            text-decoration: none;
        }

        .signup a:hover {
            color: #ffd700; /* Change the color on hover as needed */
        }
    </style>
</head>

<body>
    <section>
        <div class="signup">
            <h2>Signup Page</h2>
            <?php if (isset($_SESSION["signup"])): ?>
                <div>
                    <p>
                        <?= $_SESSION['signup'];
                        unset($_SESSION['signup']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form class="signup-form" action="signup-logic.php" enctype="multipart/form-data" method="post">
                <input type="text" placeholder="First Name" name="firstname" value="<?= $firstname ?>"><br><br>
                <input type="text" placeholder="Last Name" name="lastname" value="<?= $lastname ?>"><br><br>
                <input type="text" placeholder="Username" name="username" value="<?= $username ?>"><br><br>
                <input type="email" placeholder="Email" name="email" value="<?= $email ?>"><br><br>
                <input type="password" placeholder="Create Password" name="createpassword"><br><br>
                <input type="password" placeholder="Confirm Password" name="confirmpassword"><br><br>
                Avatar: <input type="file" name="avatar"><br><br>
                <input type="submit" name="submit"><br><br>
            </form>
            <div><a href="signin.php">Already have an account?</a></div>
        </div>
    </section>
</body>

</html>
