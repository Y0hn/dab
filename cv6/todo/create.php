<?php
require_once '../db.php';

if (isset($_POST['create'])) {
    $task = $_POST['task'];
    try {
        $sql = 'INSERT INTO todo (task) VALUES (?);';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$task]);
        header('Location: ../index.php');
    } catch (PDOException $e) {
        echo "<p>ERROR: {$e->getMessage()}</p>";
    }
} 
?>

<form action="" method="POST">
    <label for="task">New task:</label>
    <textarea name="task" id="task" rows="2"></textarea>
    <input type="submit" name="create" value="Add text">
</form>

<a href="../index.php">Back</a>