<?php

include 'header.php';

$username = $_SESSION['signin-data']['username'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data']);
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
    <section>
        <div class="signin">
            <?php if(isset($_SESSION['signup-success'])) : ?>
                <p>
                    <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
                </p>
            <?php elseif(isset($_SESSION['signin'])) : ?>
                <p>
                    <?= $_SESSION['signin'];
                    unset($_SESSION['signin']);
                    ?>
                </p>
            <?php endif ?>
            <form class="signin-form" action="signin-logic.php" method="post">
                <label for="username">Username or Email:</label>
                <input type="text" id="username" name="username" value="<?= $username ?>"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" name="submit"><br><br>
            </form>
            <div><a href="signup.php">Don't have an account?</a></div>
        </div>
    </section>
</body>

</html>
