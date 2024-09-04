<?php

class Middleware
{

    public function checkAdmin(): bool
    {
        if (isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"] == true) {
            return true;
        } else {
            return false;
        }
    }

    public function checkMember(): bool
    {
        if (isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true) {
            return true;
        } else {
            return false;
        }
    }
}
