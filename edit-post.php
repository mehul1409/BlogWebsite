<?php
include 'header.php';

$fetchcategory = "select * from category";
$fetchcategoryresult = mysqli_query($conn, $fetchcategory);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fetch_editpost = "select * from posts where id = $id";
    $fetch_editpost_result = mysqli_query($conn, $fetch_editpost);
    $result = mysqli_fetch_assoc($fetch_editpost_result);
} else {
    header('location:' . 'manage-post.php');
    die();
}
?>
<section class="edit-post-section">
    <h2 class="edit-post-heading">Edit post</h2>
    <form action="edit-post-logic.php" method="post" class="edit-post-form">
        <input type="hidden" name="id" value="<?= $result['id'] ?>" class="post-id">
        Tittle:<input type="text" name="tittle" value="<?= $result['tittle'] ?>" class="post-tittle"><br><br>
        Category :<select name="category" class="post-category">
            <?php while ($row = mysqli_fetch_assoc($fetchcategoryresult)): ?>
                <option value="<?= $row['id']?>"><?= $row['tittle'] ?></option>
            <?php endwhile ?>
        </select><br><br>
        Body: <textarea name="body" class="post-body"><?= $result['body'] ?></textarea><br><br>
        <input type="submit" name="submit" value="Update Post" class="submit-button"><br><br>
    </form>
</section>

<?php
include 'footer.php';
?>
