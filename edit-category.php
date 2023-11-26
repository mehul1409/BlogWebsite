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
<section>
    <h2>Edit category</h2>
    <form action="edit-category-logic.php" method="post">
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        tittle:<input type="text" name="tittle" value="<?= $result['tittle'] ?>"><br><br>
        description: <textarea name="description"><?= $result['description'] ?></textarea><br><br>
        <input type="submit" name="submit" value="update category"><br><br>
    </form>
</section>

<?php
include 'footer.php';
?>