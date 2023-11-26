<?php
include 'header.php';
?>

<section>

    <?php
    if (isset($_SESSION["add-user-success"])): ?>
        <div>
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["edit-user-success"])): ?>
        <div>
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["delete-user-success"])): ?>
        <div>
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
            </p>
        </div>
    <?php endif ?>

    <a href="">Add posts</a><br>
    <a href="">Manage posts</a><br>

    <?php if (isset($_SESSION['user_isadmin'])): ?>

        <a href="add-user.php">add user</a><br>
        <a href="manage-users.php">manage user</a><br>
        <a href="">add category</a><br>
        <a href="">manage category</a><br>

    <?php endif ?>
</section>

<?php
include 'footer.php';
?>