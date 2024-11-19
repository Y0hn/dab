<?php 

$dbHost = 'localhost';
$dbName = 'dab';
$dbUser = 'jano';
$dbPass = 'jano';

session_start();

try{
    $conn = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass);

}catch(Exception $e){
    echo "<p>Chyba: {$e->getMessage()}</p>";
}

function createHeader($title = 'Prihlasenie'){
    require_once 'inc/header.php';
}

function createFooter(){
    require_once 'inc/footer.php';
}


//registracia
function showRegistrationForm(){
    require_once 'inc/regForm.php';
}
//login
function showLoginForm(){
    require_once 'inc/logForm.php';
}


function addUser($nick, $pass){
    global $conn;
    // validacia
    $error = false;

    $nickLenght = mb_strlen($nick);
    if($nickLenght < 3 || $nickLenght > 15){
        echo '<p>Nevhodna dlzka mena(3 - 15 znakov).</p>';
        $error = true;
    }

    $passLenght = mb_strlen($pass);
    if($passLenght < 5 || $passLenght > 20){
        echo '<p>Nevhodna dlzka hesla(5 - 20 znakov).</p>';
        $error = true;
    }

    if(!usernameAvailable($nick)){
        echo '<p>Uyivatelske nick sa uz pouziva.</p>';
        $error = true;
    }

    if($error === true) return false;
    //sem sa dostneme ak je vsetko OK

    try{
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        $sql = 'INSERT INTO user VALUES (null, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nick, $passHash, getRandomText(8)]);
        echo  "<p>Uzivatel {$nick} úspešne pridaný.</p>";
        tryLoginUser($nick,$pass);
    }catch(Exception $e){
        echo "<p>Chyba: {$e->getMessage()}</p>";
    }
}

function usernameAvailable($username){
    global $conn;
    try{
        
        $sql = 'SELECT COUNT(nick) as count from user WHERE nick=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['count'] === 0) return true;
    }catch(Exception $e){
        echo "<p>Chyba: {$e->getMessage()}</p>";
    }
    return false;
}

function tryLoginUser($nick, $pass)
{
    global $conn;
    $error = '';
    try{
        
        $sql = 'SELECT * from user WHERE nick=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nick]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data === false)
            $error = "<p>Uzivatel {$nick} neexistuje!</p>";
        else if (!password_verify($pass, $data['pass']))
            $error = "<p>Nespravne heslo!</p>";
    }catch(Exception $e){
        $error = "<p>Chyba: {$e->getMessage()}</p>";
    }
    if ($error === '')
    {
        echo "<p>Uzivatel uspesne prihlaseny!</p>";
        $_SESSION['secret'] = $data['secret'];
    }
    else 
        echo $error;
}

function dd($var){
    var_dump($var);
    die();
}

function getRandomText($lenght) {
    $chars = 'qwsdfvgbnmkloiuhgfASRTZUIKNCGZUIOpokjb1234567890_';
    $text = '';
    for($i = 0; $i < $lenght; $i++){
    $index = random_int(0, strlen($chars) - 1);
    $text .= $chars[$index];
    }
    return $text;
}