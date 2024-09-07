<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esport</title>
    <link rel="stylesheet" href="../../assets/custom.css">
    <script src="../../assets/jquery.min.js"></script>
</head>

<body>
    <?php if (isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true) { ?>
        <nav>

            <a href="">Home</a>
            <a href="">Game</a>
            <a href="">Team</a>
            <a href="">Profile</a>


        </nav>
    <?php } else { ?>
        <nav>
            <a href="">Home</a>
            <a href="">Game</a>
            <a href="">Team</a>
            <a href="">Login</a>
        </nav>
    <?php } ?>