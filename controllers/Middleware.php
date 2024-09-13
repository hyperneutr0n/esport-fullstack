<?php

class Middleware
{

    public static function checkAdmin(): bool
    {
        session_start();
        if (isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"] == true) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkMember(): bool
    {
        session_start();
        if (isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkPostMethod(): bool
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            return true;
        } else {
            return false;
        }
    }
}
