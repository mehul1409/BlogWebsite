<?php
include 'header.php';

$current_admin = $_SESSION['user-id'];
$fetch_users = "select * from users where not id = $current_admin order by firstname";
$fetch_users_result = mysqli_query($conn, $fetch_users);

?>
<section class="manage-users-section">

    <h2 class="manage-users-heading">Manage users</h2>
    <?php
    if (isset($_SESSION["edit-user"])): ?>
        <div class="message-box">
            <h3 class="message">
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </h3>
        </div>
    <?php elseif (isset($_SESSION["delete-user"])): ?>
        <div class="message-box">
            <h3 class="message">
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if(mysqli_num_rows($fetch_users_result) > 0): ?>
    <table class="users-table">
        <thead>
            <tr>
                <th class="user-name">Name</th>
                <th class="user-username">Username</th>
                <th class="edit-col">Edit</th>
                <th class="delete-col">Delete</th>
                <th class="admin-col">Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($fetch_users_result)) : ?>
                <tr>
                    <td><?= $result['firstname']." ".$result['lastname'] ?></td>
                    <td><?= $result['username'] ?></td>
                    <td><a href="edit-user.php?id=<?= $result['id']?>" class="edit-link">Edit</a></td>
                    <td><a href="delete-user.php?id=<?= $result['id']?>" class="delete-link">Delete</a></td>
                    <td><?= $result['is_admin'] ? 'yes' : 'no' ?></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <?php else :?>
        <h1 class="no-users-message">No users found</h1>
    <?php endif ?>
</section>

<?php
include 'footer.php'
?>
