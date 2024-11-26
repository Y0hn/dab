<nav id="mainNav">
    <a class="navBtn" href="index.php">Domov</a>
    <?php 
    if (authorize())
    {
        echo '<a class="navBtn" href="logout.php">Odhlasenie</a>';
    }
    else
    {
        echo '<a class="navBtn" href="login.php">Prihlasenie</a>';
        echo '<a class="navBtn" href="singup.php">Registracia</a>';
    }
    ?>
</nav>