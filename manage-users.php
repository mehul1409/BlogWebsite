<?php
include 'header.php';

$current_admin = $_SESSION['user-id'];
$fetch_users = "select * from users where not id = $current_admin";
$fetch_users_result = mysqli_query($conn, $fetch_users);

?>
<section>

    <h2>Manage users</h2>
    <?php
    if (isset($_SESSION["edit-user"])): ?>
        <div>
            <h3>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </h3>
        </div>
    <?php elseif (isset($_SESSION["delete-user"])): ?>
        <div>
            <h3>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if(mysqli_num_rows($fetch_users_result) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>username</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($fetch_users_result)) : ?>
                <tr>
                    <td><?= $result['firstname']." ".$result['lastname'] ?></td>
                    <td><?= $result['username'] ?></td>
                    <td><a href="edit-user.php?id=<?= $result['id']?>">Edit</a></td>
                    <td><a href="delete-user.php?id=<?= $result['id']?>">Delete</a></td>
                    <td><?= $result['is_admin'] ? 'yes' : 'no' ?></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <?php else :?>
        <h1>No users found</h1>
    <?php endif ?>
</section>

<?php
include 'footer.php'
?>