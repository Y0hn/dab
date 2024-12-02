<?php
try {
    $dbHost = 'localhost';
    $dbName = 'dab';
    $dbUser = 'jano';
    $dbPass = 'jano';

    $dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";
    $conn = new PDO($dsn, $dbUser, $dbPass);  

} catch (PDOException $e) {
    echo "<p>DB ERROR: {$e->getMessage()}</p>";
}
?>