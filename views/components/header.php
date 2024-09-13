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
    <?php } else if (isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"] == true) { ?>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li>
                    <a href="#">Member</a>
                    <ul>
                        <li><a href="#">Show All</a></li>
                    </ul>
                </li>
                <li><a href="#">Game</a>
                    <ul>
                        <li><a href="/admin/game">Show All</a></li>
                    </ul>
                </li>
                <li><a href="#">Team</a>
                    <ul>
                        <li><a href="#">Show All</a></li>
                    </ul>
                </li>
                <li><a href="#">Event</a>
                    <ul>
                        <li><a href="#">Show All</a></li>
                    </ul>
                </li>
                <li><a href="#">Achievement</a>
                    <ul>
                        <li><a href="#">Show All</a></li>
                    </ul>
                </li>
                <li><a href="#">Join Proposal</a>
                    <ul>
                        <li><a href="#">Show All</a></li>
                    </ul>
                </li>
                <li><a href="#">Team members</a>
                    <ul>
                        <li><a href="#">Show All</a></li>
                    </ul>
                </li>
                <li><a href="#">Event teams</a>
                    <ul>
                        <li><a href="#">Show All</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    <?php } else { ?>
        <nav>
            <a href="">Home</a>
            <a href="">Game</a>
            <a href="">Team</a>
            <a href="/member/login">Login</a>
        </nav>
    <?php } ?>