<?php
include 'header.php';

$current_author = $_SESSION['user-id'];
$fetch_posts = "select id , tittle , category_id from posts where author_id = $current_author order by id desc";
$fetch_users_result = mysqli_query($conn, $fetch_posts);

?>
<section class="manage-posts-section">

    <h2 class="manage-posts-heading">Manage posts</h2>
    <?php
    if (isset($_SESSION["edit-post"])): ?>
        <div class="success-message">
            <h3>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </h3>
        </div>
    <?php elseif (isset($_SESSION["delete-post"])): ?>
        <div class="success-message">
            <h3>
                <?= $_SESSION['delete-post'];
                unset($_SESSION['delete-post']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if(mysqli_num_rows($fetch_users_result) > 0): ?>
    <table class="posts-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($fetch_users_result)) : ?>
                <?php
                $category = $result['category_id'];
                $query = "select tittle from category where id = $category";
                $resultcategory = mysqli_query($conn, $query);
                $categorytittle = mysqli_fetch_array($resultcategory);
                ?>
                <tr>
                    <td><?= $result['tittle']?></td>
                    <td><?= $categorytittle['tittle'] ?></td>
                    <td><a href="edit-post.php?id=<?= $result['id']?>" class="edit-link">Edit</a></td>
                    <td><a href="delete-post.php?id=<?= $result['id']?>" class="delete-link">Delete</a></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <?php else :?>
        <h1 class="nopostmessage">No posts found</h1>
    <?php endif ?>
</section>

<?php
include 'footer.php'
?>
