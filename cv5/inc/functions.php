<?php
$dbHost = 'localhost';
$dbName = 'hronec';
$dbUser = 'denis';
$dbPass = 'denis';

try
{   
    $conn = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass);
} catch (Exception $e) {
    echo "<p>Chyba {$e->getMessage()}</p>";
}

function createHeader()
{
    require_once 'inc/header.php';
}
function createFooter()
{
    require_once 'inc/footer.php';
}

function showRegistrationForm()
{
    require_once 'inc/form.php';
}

function addUser($nick, $pass)
{
    $error = false;

    $nickLen = mb_strlen($nick);
    $passLen = mb_strlen($pass);
    if ($nickLen < 3 || 15 < $nickLen)
    {
        echo '<p>Nevhodne a dlzka mena (3-15 znakov).</p>';
        $error = true;
    }
    else if (!usernameAvailable($nick))
    {
        echo '<p>Meno sa uz pouziva</p>';
        $error = true;
    }
    if ($passLen < 5 || 20 < $passLen)
    {
        echo '<p>Nevhodne a dlzka hesla (5-20 znakov).</p>';
        $error = true;
    }

    if ($error) return false;
    // sem sa dostane ak je vsetko ok

    try {
        global $conn;
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        $sql = 'INSERT INTO user VALUES (null, ?, ?, null, null, null);';
        $conn->prepare($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nick,$pass]);
    } catch (Exception $e) {
        echo "<p>Chyba {$e->getMessage()}</p>";
    }

    echo $nick . " / " . $pass;
}
function usernameAvailable($username)
{
    try {
        global $conn;
        $sql = 'SELECT COUNT(nick) as count FROM user WHERE nick = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //dd($data);
        if ($data['count'] === 0) 
            return true;
    } catch (Exception $e) {
        echo "<p>Chyba {$e->getMessage()}</p>";        
    }
    return false;
}

function dd($var)
{
    var_dump($var);
    die();
}
function getRandomText($lengh)
{
    $chars = '';
    $stmt = "";

}