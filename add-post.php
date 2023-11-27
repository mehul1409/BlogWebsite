<?php 

include 'header.php';
$query = "select * from category";
$result = mysqli_query($conn, $query);

$tittle = $_SESSION['add-post-data']['tittle'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);
?>

<section>
    <h2>Add Posts</h2>
    <div class="error-message">
        <?php if(isset($_SESSION['add-post'])) : ?>
            <h3>
                <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
            </h3>
        <?php endif ?>
    </div>
    <form action="add-posts-logic.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="tittle" name="tittle" value="<?= $tittle ?>"><br><br>
        <label for="category">Category:</label>
        <select name="category">
            <option>select</option>
            <?php while($row = mysqli_fetch_array($result)) : ?>
                <option value="<?= $row['id'] ?>"><?= $row['tittle'] ?></option>
            <?php endwhile ?>
        </select><br><br>
        <textarea name="body" placeholder="body"><?= $body ?></textarea><br><br>
        <label for="postthumbnail">thumbnail</label>
        <input type="file" name="postthumbnail"><br><br>
        <input type="submit" name="submit" value="add post">
    </form>
</section>


<?php
include 'footer.php';
?>