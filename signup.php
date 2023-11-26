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
</head>

<body>
    <section>
        <div class="signup">
            <h2>signup page</h2>
            <?php
            if (isset($_SESSION["signup"])): ?>
                <div>
                    <p>
                        <?= $_SESSION['signup'];
                        unset($_SESSION['signup']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="signup-logic.php" enctype="multipart/form-data" method="post">
                <input type="text" placeholder="firstname" name="firstname" value="<?= $firstname ?>"><br><br>
                <input type="text" placeholder="lastname" name="lastname" value="<?= $lastname ?>"><br><br>
                <input type="text" placeholder="username" name="username" value="<?= $username ?>"><br><br>
                <input type="email" placeholder="email" name="email" value="<?= $email ?>"><br><br>
                <input type="password" placeholder="create password" name="createpassword"><br><br>
                <input type="password" placeholder="confirm password" name="confirmpassword"><br><br>
                avatar:<input type="file" name="avatar"><br><br>
                <input type="submit" name="submit"><br><br>
            </form>
            <div><a href="signin.php">Already have an account?</a></div>
        </div>
    </section>
</body>

</html>