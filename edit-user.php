<?php
include 'header.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $fetch_edituser = "select * from users where id = $id";
    $fetch_edituser_result = mysqli_query($conn, $fetch_edituser);
    $result = mysqli_fetch_assoc($fetch_edituser_result);
}else{
    header('location:'. 'manage-users.php');
    die();
}
?>

<section class="edit-user-section">
    <?php if (isset($_SESSION["edit-user"])): ?>
        <div class="success-message">
            <h3>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <h2>Edit user</h2>
    <form class="edit-user-form" action="edit-user-logic.php" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?= $result['firstname'] ?>"><br><br>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?= $result['lastname'] ?>"><br><br>
        <label for="userrole">User Role:</label>
        <select name="userrole">
            <option value="0" <?= $result['is_admin'] == 0 ? 'selected' : '' ?>>Author</option>
            <option value="1" <?= $result['is_admin'] == 1 ? 'selected' : '' ?>>Admin</option>
        </select><br><br>
        <input type="submit" name="submit" value="Update User"><br><br>
    </form>
</section>

<?php
include 'footer.php';
?>