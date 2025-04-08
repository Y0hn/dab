<!DOCTYPE html>
<html lang="en">

<?php
    $error = '';

function Error($e)
{
    global $error;
    if (!empty($error))
        $error .= "<br>";
    $error .= $e;
}

if (isset($_POST['reg']))
{
    $usernameLenght = mb_strlen($_POST['username']);
    $passwordLenght = mb_strlen($_POST['pass']);
    $regularMail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $regularPass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    $regularMobi = "/^\w{4} \w{3} \w{3}$/";
    
    if ($usernameLenght < 5 || 20 < $usernameLenght)
        Error('Dlzka mena musí byt 5 až 20 znakov ' . "(odovzdana dlzka = {$usernameLenght})");
    if ($passwordLenght < 8)
        Error("Minimálna dĺžka hesla je 8 znakov.". "(odovzdana dlzka = {$passwordLenght})");
    if (!preg_match($regularPass, $_POST['pass']))
        Error("Heslo musí obsahovať aspoň jedno malé a veľké písmeno, číslo a špeciálny znak.");
    if ($_POST['pass'] !== $_POST['pass2'])
        Error("Heslá sa nezhodujú.");
    if (!preg_match($regularMail, $_POST['email']))
        Error("Zadajte platnú e-mailovú adresu!");
    if (count(explode(' ', trim($_POST['realname']))) < 2)
        Error("Zadajte meno aj prizvisko");
    if (!preg_match($regularMobi, $_POST['phone']))
        Error("Nespravny tvar telefonneho cisla");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <H2>Registracia</H2>
        <p class="redText"></p>
        <p class="errorCode"><?= $error ?></p>
        <section class="col">
            <fieldset>
                <legend>údaje používatela</legend>
                <label for="username">Uživateľské meno</label>
                <input type="text" name="username" id="username">

                <label for="pass">Heslo</label>
                <input type="password" name="pass" id="pass">

                <label for="pass2">Heslo znova</label>
                <input type="password" name="pass2" id="pass2">

                <label for="email">Email</label>
                <input type="type" name="email" id="email">
            </fieldset>
            <fieldset>
                <legend>Osobné údaje</legend>

                <label for="realname">Meno a priezvisko</label>
                <input type="text" name="realname" id="realname">

                <label for="phone">Mobil</label>
                <input type="number" name="phone" id="phone">

                <label for="birth">Rok narodenia</label>
                <input type="birth" name="birth" id="birth">

                <input type="checkbox" name="gdpr" id="gdpr">
                <label for="gdpr">Súhlasím s GDPR.</label>


            </fieldset>
        </section>
        <input type="submit" name="reg" value="Registruj ma!">
    </form>
</body>

<script>
    let errorDisplay = document.querySelector('p.redText');

    let inUsername = document.querySelector('input#username');
    let errors = [];

    inUsername.addEventListener('input', validateUsername);

    let inPass = document.querySelector('input#pass');
    inPass.addEventListener('input', validatePass);
    let inPass2 = document.querySelector('input#pass2');
    inPass2.addEventListener('input', validatePass);
    let inEmail = document.querySelector('input#email');
    inEmail.addEventListener('input', validateEmail);

    function validateUsername() {
        let username = inUsername.value;

        if (username.length < 5 || username.length > 15) {
            errors[0] = 'Dlzka mena musí byt 5 až 20 znakov.';
            errors[0] += '(aktualna dlzka = ' + username.length + ')'
            inUsername.style.outline = '2px solid red';
        } else {
            errors[0] = '';
            inUsername.style.outline = '2px solid black';
            inUsername.style.background = 'white'

        }
        updateErrorDisplay();
    }

    function updateErrorDisplay() {
        let text = '';
        for (let i = 0; i < errors.length; i++) {
            if (errors[i] != '' && errors[i] !== undefined)
        {
            text += errors[i] + '<br>'
        }


        }
        errorDisplay.innerHTML = text;

        if (text === '') {
            errorDisplay.style.display = 'none'
            return false;
        } else {
            errorDisplay.style.display = 'block';
            return true;
        }
    }

    function validatePass() {
        let pass = inPass.value;
        let pass2 = inPass2.value;
        let regularExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
        if (!regularExpression.test(pass) || pass !== pass2) {
            errors[1] = '';
            if (!regularExpression.test(pass)) {
                errors[1] += 'Heslo aspon jeden znak, male a velke pismeno, cislo';
                errors[1] += 'dlzka aspon 8 znakov';
                if (pass !== pass2) {
                    errors[1] += '<br>';
                }


            }

            if (pass !== pass2) {
                errors[1] += 'Heslá sa nezhodujú';
            }
            inPass.style.outline = '2px solid red';
            inPass2.style.outline = '2px solid red';

        } else {
            errors[1] = '';            inPass.style.outline = '2px solid black';
            inPass2.style.outline = '2px solid black';
        }
        updateErrorDisplay();
    }

    function validateEmail()
    {
        let emailreg = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/
        let email = inEmail.value;

        if (!emailreg.test(email))
    {
        errors[2] = 'Email nemoze obsahovat divne znaky!!';
        inEmail.style.outline = '2px solid red';


    } else {
            errors[2] = '';
            inEmail.style.outline = '2px solid black';

    }
    updateErrorDisplay();
    }
</script>

</html>