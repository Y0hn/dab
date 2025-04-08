<?php

$dbHost = '127.0.0.1';
$dbName = 'blog';

$dbUser = 'jano';
$dbPass = 'jano';

$dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4;port=3360;";

try {
    $conn = new PDO ($dsn, $dbUser, $dbPass);
} catch (Exception $e) {
    echo "Databese Error: {$e->getMessage()}";
    die();
}

?>