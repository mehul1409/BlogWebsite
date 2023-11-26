<?php 
include 'header.php';

$tittle = $_SESSION['add-category-data']['tittle'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;
unset($_SESSION['add-category-data']);
?>

<section>
    <h2>Add category</h2>
    <?php if(isset($_SESSION['add-category'])): ?>
        <h4>
            <?= $_SESSION['add-category'];
            unset($_SESSION['add-category']);
            ?>
        </h4>
    <?php endif ?>
    <form action="add-category-logic.php" method="post">
        <input type="text" placeholder="tittle" name="tittle" value="<?= $tittle ?>"><br><br>
        <textarea name="description" placeholder="add description"><?= $description ?></textarea><br><br>
        <input type="submit" value="add category" name="submit">
    </form>
</section>


<?php

include 'footer.php';

?>