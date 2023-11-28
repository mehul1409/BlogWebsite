<?php
include 'header.php';

$query = "select * from category";
$result = mysqli_query($conn, $query);
?>

<section class="manage-categories-section">
    <h2 class="manage-categories-heading">Manage categories</h2>
    <?php if (isset($_SESSION["edit-category"])): ?>
        <div class="edit-category-message">
            <h3>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </h3>
        </div>
    <?php elseif (isset($_SESSION["delete-category-success"])): ?>
        <div class="delete-category-message">
            <h3>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="category-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($category = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?= $category['tittle'] ?></td>
                        <td><?= $category['description'] ?></td>
                        <td><a href="edit-category.php?id=<?= $category['id'] ?>" class="edit-link">Edit</a></td>
                        <td><a href="delete-category.php?id=<?= $category['id'] ?>" class="delete-link">Delete</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    <?php else : ?>
        <h1 class="no-categories-message">No categories found</h1>
    <?php endif ?>
</section>

<?php
include 'footer.php'
?>
