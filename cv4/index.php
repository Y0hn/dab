<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inc/style.css">
    <title>Formular</title>
</head>
<body>
    <?php
        /*
        echo '<pre>';
        var_dump($_SERVER);
        echo '<\pre>';
        */
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            require "inc/form.php";
        }
        else if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            require "inc/processForm.php";
        }

    ?>
</body>
</html>