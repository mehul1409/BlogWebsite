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
<section>
    <h2>Edit user</h2>
    <form action="edit-user-logic.php" method="post">
        firstname:<input type="text" name="firstname" value="<?= $result['firstname'] ?>"><br><br>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        lastname:<input type="text" name="lastname" value="<?= $result['lastname'] ?>"><br><br>
        userrole:<select name="userrole">
            <option value="0">Author</option>
            <option value="1">Admin</option>
        </select><br><br>
        <input type="submit" name="submit" value="update user"><br><br>
    </form>
</section>

<?php
include 'footer.php';
?>