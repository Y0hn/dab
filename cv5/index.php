<?php
require_once 'inc/functions.php';

createHeader();

if (isset($_SESSION['secret']) && !empty($_SESSION['secret']))
    echo "ste prihlaseny";
else
    echo "nie ste prihlaseny";


createFooter();