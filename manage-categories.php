<?php
include 'header.php';

$query = "select * from category";
$result = mysqli_query($conn, $query);

?>
<section>

    <h2>Manage categories</h2>
    <?php
    if (isset($_SESSION["edit-category"])): ?>
        <div>
            <h3>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </h3>
        </div>
    <?php elseif (isset($_SESSION["delete-category-success"])): ?>
        <div>
            <h3>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if(mysqli_num_rows($result) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Tittle</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while($category = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td><?= $category['tittle']?></td>
                    <td><?= $category['description'] ?></td>
                    <td><a href="edit-category.php?id=<?= $category['id']?>">Edit</a></td>
                    <td><a href="delete-category.php?id=<?= $category['id']?>">Delete</a></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <?php else :?>
        <h1>No categories found</h1>
    <?php endif ?>
</section>

<?php
include 'footer.php'
?>