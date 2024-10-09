<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esport</title>
    <link rel="stylesheet" href="../../assets/custom.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="../../assets/jquery.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="text-logo">
                <h2><a href="/">Informatics Club</a></h2>
            </div>
            <ul>
                <?php if (isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true) { ?>

                    <li><a href="/member/joinproposal">Proposal</a></li>
                    <li><a href="/member/event">Events</a></li>
                    <li><a href="/member/achievement">Achievements</a></li>
                    <li><a href="/process/logout">Logout</a></li>

                <?php } else if (isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"] == true) { ?>

                    <li><a href="/admin/home">Admin</a></li>
                    <li><a href="/process/logout">Logout</a></li>

                <?php } else { ?>

                    <li><a href="/member/login">Login</a></li>

                <?php } ?>
            </ul>
        </nav>
    </header>