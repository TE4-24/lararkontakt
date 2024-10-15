<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>main</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            session_start();
            echo htmlspecialchars($_SESSION['firstName']). " ". htmlspecialchars($_SESSION['lastName']);
        ?>
    </body>
</html>