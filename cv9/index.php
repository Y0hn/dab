<?php
require_once 'db.php';

$data = [];

try {
    $sql = 'SELECT id, title FROM blogposts ORDER BY id DESC';
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Index Error: {$e->getMessage()}";
    die();
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
    <h1>Our Articles</h1>
    
    <?php
        foreach ($data as $row) {
            echo "<p><a href='post.php?id={$row['id']}'>{$row['title']}</a></p>";
        }
    ?>
</body>
</html>