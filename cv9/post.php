<?php
$data = [];
$comments = [];

if (isset($_GET['id']))
{
    require_once 'db.php';
    
    try {
        // Commenting
        if (isset($_POST['comment'])) {
            $sql = 'INSERT INTO blogcomment VALUES (DEFAULT, ?, ?);';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_GET['id'], $_POST['text']]);            
        }

        // Get Post
        $sql = 'SELECT * FROM blogposts WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Get Comments
        $sql = 'SELECT * FROM blogcomment WHERE id_post = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Index Error: {$e->getMessage()}";
        die();
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <title>Document</title>
</head>
<body>
    <a href='index.php'>Go back</a>
    <h2><?= $data['title'] ?? '' ?></h2>
    <img height="200" src="./images/<?= $data['image'] ?? '' ?>" alt="">
    <p><?= $data['text'] ?? 'No data for browsing' ?></p>

    <?php
        foreach ($comments as $row) {
            echo "<p>{$row['text']}</p>";
        }
    ?>

    <form action="" method="post">
        <input type="text" name="text" placeholder="New comment">
        <input hidden type="number" name="id" placeholder="<?= $_GET['id'] ?? -1 ?>">
        <input type="submit" name="comment" value="Add comment">        
    </form>
</body>
</html>