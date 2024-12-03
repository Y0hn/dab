<?php
$navItems = array(
    "Home" => "index.php",
    "Gallery" => "index.php",
    "About us" => "index.php",
    "Information" => "index.php",
    "Contact" => "index.php",    
);
function createNavigation()
{
    global $navItems;
    echo '<nav id="mainNav">';
    foreach ($navItems as $label => $url)
        createNavigationBtn($label,$url);
    echo '</nav>';
}
function createNavigationBtn($label, $url)
{
    echo "<a class='navBtn' href='{$url}'>{$label}</a>";
}
function createHeader($pageTitle = "Moja Stranka", $pageHeading = "Vitajte na Mojej Stranke")
{
    require 'inc/header.php';
}
function createFooter()
{
    require 'inc/footer.php';
}

// Malo by byt v novom subore
class Post
{
    public $title;
    public $text;
    public $imageUrl;
    public $autor;

    public function __construct($title,$text,$autor,$imageUrl)
    {
        $this->title =  $title;
        $this->text =   $text;
        $this->autor =  $autor;
        $this->imageUrl = $imageUrl;
    }

    public function displayPost()
    {
        $title = $this -> title;
        $autor = $this -> autor;
        $src = $this -> imageUrl;
        $text = $this -> text;
        include "inc/post.php";
    }
}

