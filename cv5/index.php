<?php
require 'inc/header.php';
require_once 'inc/functions.php';

createHandler();

if (isset($_POST['regSubmit']))
{
    $meno = $_POST['meno'];
    $heslo = $_POST['heslo'];
}
require 'inc/footer.php';
?>