<?php
    $heading = "Tu skusame syntax";
    $day = date("w");

    require "inc/header.php";
    /*
    if (0 < $day && $day < 6)
        echo "Dobry den";
    else
        echo "Pekny vikend";

    echo "\nPrajeme pekn";
    switch ($day)
    {
        case 1: $dayName = "y pondelok"; break;
        case 2: $dayName = "y utorok";   break;
        case 3: $dayName = "u stredu"; break;
        case 4: $dayName = "y stvrtok"; break;
        case 5: $dayName = "y piatok"; break;
        case 6: $dayName = "u sobotu"; break;
        case 0: $dayName = "u nedelu"; break;
        default: $dayName = "y neznamy den"; break;
    }
    echo $dayName;

    $href = "https://www.lipsum.com/";
    $text = "Lorem Ipsum";

    $html = "<a target='_blank' href=\"{$href}\">{$text}</a>";
    $html = "<a target=\"_blank\" href='" . $href . "'>" . $text . "</a>";
    echo $html;
    */

    $pole = array
    (
        "Prva sprava",
        "Von je slnecno",
        "Koniec",
        "Nieco",
        "xdd"
    );
    echo '<section id="zoznam">';
    for ($i = 0; $i < count($pole); $i++)
    {
        echo "<p>{$pole[$i]}</p>";
    }
    echo '</section>';

    include "inc/footer.php";
?>