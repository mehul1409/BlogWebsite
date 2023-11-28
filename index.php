<?php 

include 'header.php';

$query = "SELECT * FROM posts ORDER BY `date-time` DESC LIMIT 9;";
$posts = mysqli_query($conn, $query);
?>

<section class="posts">
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
        <?php while ($row = mysqli_fetch_assoc($posts)) : ?>
            <div style="display: flex; flex-direction: column; border: 1px solid #ccc; max-width: 100%; margin:20px 10px;border-radius:30px;">
                <div style="max-width: 100%; overflow: hidden;">
                    <img src="<?= 'userimages/'.$row['thumbnail'] ?>" alt="post thumbnail" style="width: 100%; height: auto;border-radius:30px; ">
                </div>
                <div style="padding: 10px;">
                    <?php
                    $categoryQuery = "SELECT tittle FROM category WHERE id = {$row['category_id']}; ";
                    $categoryResult = mysqli_query($conn, $categoryQuery);
                    $categoryRow = mysqli_fetch_assoc($categoryResult);
                    $categoryName = $categoryRow['tittle'];
                    ?>
                    <h3 style="margin: 0; color: #3498db; text-align:center;"><?= $categoryName ?></h3>
                    <div style="font-size: 1.2em; margin: 5px 0; text-align: justify; "><?= $row['tittle'] ?></div>
                    <div style="margin: 5px 0;text-align: justify;"><?= $row['body'] ?></div>
                </div>
            </div>
             <?php endwhile ?>
        </div>
</section>

<?php
include 'footer.php';
?>
