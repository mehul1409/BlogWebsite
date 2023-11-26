<?php 

include 'header.php';

$firstname = isset($_SESSION['add-user-data']['firstname']) ? $_SESSION['add-user-data']['firstname'] : '';
$lastname = isset($_SESSION['add-user-data']['lastname']) ? $_SESSION['add-user-data']['lastname'] : '';
$username = isset($_SESSION['add-user-data']['username']) ? $_SESSION['add-user-data']['username'] : '';
$email = isset($_SESSION['add-user-data']['email']) ? $_SESSION['add-user-data']['email'] : '';
$createpassword = isset($_SESSION['add-user-data']['createpassword']) ? $_SESSION['add-user-data']['createpassword'] : '';
$confirmpassword = isset($_SESSION['add-user-data']['confirmpassword']) ? $_SESSION['add-user-data']['confirmpassword'] : '';
unset($_SESSION['add-user-data']);
?>

    <section>
        <div class="signup">
            <h2>adduser</h2>
            <?php
            if (isset($_SESSION["add-user"])): ?>
                <div>
                    <p>
                        <?= $_SESSION['add-user'];
                        unset($_SESSION['add-user']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="add-user-logic.php" enctype="multipart/form-data" method="post">
                <input type="text" placeholder="firstname" name="firstname" value="<?= $firstname ?>"><br><br>
                <input type="text" placeholder="lastname" name="lastname" value="<?= $lastname ?>"><br><br>
                <input type="text" placeholder="username" name="username" value="<?= $username ?>"><br><br>
                <input type="email" placeholder="email" name="email" value="<?= $email ?>"><br><br>
                <input type="password" placeholder="create password" name="createpassword"><br><br>
                <input type="password" placeholder="confirm password" name="confirmpassword"><br><br>
                userrole:<select name="userrole" id="">
                    <option>select</option>
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select><br><br>
                avatar:<input type="file" name="avatar"><br><br>
                <input type="submit" name="submit"><br><br>
            </form>
            
        </div>
    </section>


<?php

include 'footer.php';

?>