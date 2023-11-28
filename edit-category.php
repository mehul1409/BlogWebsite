<?php
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fetch_editcategory = "select * from category where id = $id";
    $fetch_editcategory_result = mysqli_query($conn, $fetch_editcategory);
    $result = mysqli_fetch_assoc($fetch_editcategory_result);
} else {
    header('location:' . 'manage-categories.php');
    die();
}
?>
<section class="edit-category-section">
    <?php
    if (isset($_SESSION["edit-category"])): ?>
        <div class="success-message">
            <h3>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <h2>Edit category</h2>
    <form class="edit-category-form" action="edit-category-logic.php" method="post">
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <label for="tittle">Title:</label>
        <input type="text" name="tittle" value="<?= $result['tittle'] ?>"><br><br>
        <label for="description">Description:</label>
        <textarea name="description"><?= $result['description'] ?></textarea><br><br>
        <input type="submit" name="submit" value="Update Category"><br><br>
    </form>
</section>

<?php
include 'footer.php';
?>