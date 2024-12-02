<?php
require_once '../db.php';

if (isset($_POST['create'])) {
    $task = $_POST['task'];
    try {
        $sql = 'SELECT * FROM todo ORDER BY id DESC;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        echo "<p>ERROR: {$e->getMessage()}</p>";
    }
} 
?>
<a href="../index.php">Back</a>