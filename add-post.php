<?php
include 'header.php';
$query = "select * from category";
$result = mysqli_query($conn, $query);

$tittle = $_SESSION['add-post-data']['tittle'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);
?>

<section class="add-posts-section">
    <h2 class="add-posts-heading">Add Posts</h2>
    <div class="error-message">
        <?php if(isset($_SESSION['add-post'])) : ?>
            <h3>
                <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
            </h3>
        <?php endif ?>
    </div>
    <form action="add-posts-logic.php" method="post" enctype="multipart/form-data" class="add-posts-form">
        <input type="text" placeholder="Title" name="tittle" value="<?= $tittle ?>" class="post-title"><br><br>
        <label for="category" class="category-label">Category:</label>
        <select name="category" class="category-select">
            <option>select</option>
            <?php while($row = mysqli_fetch_array($result)) : ?>
                <option value="<?= $row['id'] ?>"><?= $row['tittle'] ?></option>
            <?php endwhile ?>
        </select><br><br>
        <textarea name="body" placeholder="Body" class="post-body"><?= $body ?></textarea><br><br>
        <label for="postthumbnail" class="thumbnail-label">Thumbnail</label>
        <input type="file" name="postthumbnail" class="thumbnail-input"><br><br>
        <input type="submit" name="submit" value="Add Post" class="submit-button">
    </form>
</section>

<?php
include 'footer.php';
?>
