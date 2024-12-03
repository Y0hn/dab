<h1>Prihlasenie</h1>

<form action="" method="post">
    <label for="nick">Meno:</label><br>
    <input id="nick" type="text" name="nick" value="<?= $_POST["nick"] ?? "" ?>"><br>

    <label for="heslo">Heslo:</label><br>
    <input id="heslo" type="pass" name="pass"><br>

    <input type="submit" name="logSubmit" value="Prihlas">
</form>