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
<section>
    <h2>Edit post</h2>
    <form action="edit-post-logic.php" method="post">
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        tittle:<input type="text" name="tittle" value="<?= $result['tittle'] ?>"><br><br>
        category :<select name="category">
            <?php while ($row = mysqli_fetch_assoc($fetchcategoryresult)): ?>
                <option value="<?= $row['id']?>"><?= $row['tittle'] ?></option>
            <?php endwhile ?>
        </select><br><br>
        body: <textarea name="body"><?= $result['body'] ?></textarea><br><br>
        <input type="submit" name="submit" value="update post"><br><br>
    </form>
</section>

<?php
include 'footer.php';
?>