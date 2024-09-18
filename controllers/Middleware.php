<?php

class Middleware
{

    public static function initSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function checkAdmin(): bool
    {
        self::initSession();
        if (isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"] == true) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkMember(): bool
    {
        self::initSession();
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
