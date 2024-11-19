<?php
require_once 'inc/functions.php';

if (isset($_SESSION['secret']) && !empty($_SESSION['secret']))
    echo "ste prihlaseny";
else
    "nie ste prihlaseny";

createHeader();

createFooter();