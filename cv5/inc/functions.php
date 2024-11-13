$dbHost = 'localhost';
$dbName = 'DAB';
$dbUser = 'data';
$dbPass = 'databazoveaplikacie';

try {
    $conn = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass);
} catch (Exeption $e) {
    echo "<p>Chyba {e->getMessage()}</p>"
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
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        $sql = 'INSERT INTO user VALUES (null, ?, ?, null, null, null);';
        $conn->prepare($sql);
        $stmt->execute([$name,$pass]);
    } catch (Exeption $e) {
        echo "<p>Chyba {e->getMessage()}</p>";
    }

    echo $nick . " / " . $pass;
}
function usernameAvailable($username)
{
    try {
        $sql = 'SELECT COUNT(nick) FROM user WHERE nick = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $data = $stmt->fetch(PDO::FETch_ASSOC);
        //dd($data);
        if ($data['count'] === 0) return true;
    } catch (Exeption ex) {
        echo "<p>Chyba {e->getMessage()}</p>";        
    }
    return false;
}

function dd($var)
{
    var_dump($var);
    die();
}