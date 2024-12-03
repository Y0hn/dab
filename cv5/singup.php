<?php
require_once 'inc/functions.php';

createHeader();

// content
if(isset($_POST['regSubmit'])){
    $nick = $_POST['nick'];
    $heslo = $_POST['pass'];
    addUser($nick, $heslo);
}

showRegistrationForm();

createFooter();