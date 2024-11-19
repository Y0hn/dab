<?php
require_once 'inc/functions.php';

createHeader();

// content
if(isset($_POST['logSubmit'])){
    $nick = $_POST['nick'];
    $heslo = $_POST['pass'];    
    tryLoginUser($nick,$heslo);
}

showLoginForm();

createFooter();