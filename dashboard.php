<?php
include 'header.php';
?>

<section class="dashboard-section">
    <?php
    if (isset($_SESSION["add-user-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["edit-user-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["delete-user-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["add-category-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["edit-category-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["edit-post-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["delete-post-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION["add-post-success"])): ?>
        <div class="success-message">
            <p>
                <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>
        </div>
    <?php endif ?>

    <a href="add-post.php" class="dashboard-link">Add posts</a>
    <a href="manage-post.php" class="dashboard-link">Manage posts</a>

    <?php if (isset($_SESSION['user_isadmin'])): ?>

        <a href="add-user.php" class="dashboard-link">Add user</a>
        <a href="manage-users.php" class="dashboard-link">Manage user</a>
        <a href="add-category.php" class="dashboard-link">Add category</a>
        <a href="manage-categories.php" class="dashboard-link">Manage category</a>

    <?php endif ?>
</section>

<?php
include 'footer.php';
?>
