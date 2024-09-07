<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esport</title>
    <link rel="stylesheet" href="././assets/custom.css">
</head>

<body>
    <?php if (isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true) { ?>
        <nav>

            <a href="">Home</a>
            <a href="">test</a>
            <a href="">test</a>
            <a href="">Profile</a>


        </nav>
    <?php } else { ?>
        <nav>
            <a href="">Home</a>
            <a href="">test</a>
            <a href="">test</a>
            <a href="">Login</a>
        </nav>
    <?php } ?>