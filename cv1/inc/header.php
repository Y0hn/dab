<?php
    $defaultText = "default"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>
        <?= $title ?? $defaultText ?>
    </title>
</head>

<body>
    <header>
        <nav id="mainNav">
            <a class="navBtn" href="index.php">Domov</a>
            <a class="navBtn" href="syntax.php">Syntax</a>
            <a class="navBtn" href="info.php">Informácie</a>
            <a class="navBtn" href="contact.php">Kontakt</a>
        </nav>
        <h2>
            <?php 
            /*
                if (isset($heading))
                    echo $heading;
                else
                    echo $defaultTitle;
            */
                echo $heading ?? $defaultTitle;
            ?>
        </h2>
    </header>