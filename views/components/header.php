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

                    <li><a href="/member/joinproposal"><i class="fa-solid fa-file-signature"></i> Proposal</a></li>
                    <li><a href="/member/event"><i class="fa-regular fa-calendar-days"></i> Events</a></li>
                    <li><a href="/member/achievement"><i class="fa-solid fa-medal"></i> Achievements</a></li>
                    <li><a href="/process/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

                <?php } else if (isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"] == true) { ?>

                    <li><a href="/admin/home"><i class="fa-solid fa-user-tie"></i> Admin</a></li>
                    <li><a href="/process/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

                <?php } else { ?>

                    <li><a href="/member/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>

                <?php } ?>
            </ul>
        </nav>
    </header>