<?php
$narod = array(
    "sk" => "slovenska",
    "cz" => "ceska",
    "en" => "england",
);

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $gdpr = isset($_POST['gdpr']);
    $naro = $_POST["narod"];

$dbHost = 'localhost';
$dbName = 'anco';
$dbUser = 'jano';
$dbPass = 'jano';
try {
    $con = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);
    $con = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass);
    // priprava insertu
    $sql = 'INSERT INTO uzivatel VALUES (null, ?, ?, ?, ?, ?);';
    $stmt = $con->prepare($sql);
    // vykonanie insertu
    $stmt->execute([$name,$pass,$mail,$naro,$gdpr]);

    echo "Uzivatel {$name} uspesne prihlaseny!";
    $sql = 'SELECT * FROM uzivatel;';
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
} catch (Exception $e) {
    //phpinfo();
    echo "!!!CHYBA!!!". $e->getMessage();
}
?>
<p><b>Name:</b> <?= $name ?></p>
<p><b>Mail:</b> <?= $mail ?></p>
<p><b>Pass:</b> <?= $pass ?></p>
<p><b>Nationality:</b>   <?= $narodnost[$naro] ?></p>

<!-- Ternarny operator Yes/No -->
<p><b>GDPR:</b>     <?= ($gdpr) ? "Yes" : "No" ?></p>
