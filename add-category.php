<?php 
include 'header.php';

$tittle = $_SESSION['add-category-data']['tittle'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;
unset($_SESSION['add-category-data']);
?>

<section class="add-category-section">
    <h2 class="add-category-heading">Add category</h2>
    <?php if(isset($_SESSION['add-category'])): ?>
        <h4 class="category-message">
            <?= $_SESSION['add-category'];
            unset($_SESSION['add-category']);
            ?>
        </h4>
    <?php endif ?>
    <form action="add-category-logic.php" method="post" class="category-form">
        <input type="text" placeholder="Title" name="tittle" value="<?= $tittle ?>" class="category-input"><br><br>
        <textarea name="description" placeholder="Add description" class="category-textarea"><?= $description ?></textarea><br><br>
        <input type="submit" value="Add category" name="submit" class="category-submit">
    </form>
</section>

<?php
include 'footer.php';
?>
