<?php

class Member
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function Login($username, $password)
    {
        $sql = "SELECT username,password,profile FROM member WHERE username = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $result = $stmt->fetch_assoc();

            if ($result["password"] == $password) {
                session_start();
                $role = $result["profile"];

                if ($role == "member") {
                    $_SESSION["memberLogged"] = true;
                    $_SESSION["adminLogged"] = false;
                } else {
                    $role == "admin";
                    $_SESSION["adminLogged"] = true;
                    $_SESSION["userLogged"] = false;
                }
            } else {
            }
        } else {
            echo "Wrong username or password";
        }
    }

    public function Logout()
    {
        if (isset($_SESSION["adminLogged"])) {
            unset($_SESSION["adminLogged"]);
        } else if (isset($_SESSION["userLogged"])) {
            unset($_SESSION["userLogged"]);
        }
    }

    public function Register($fname, $lname, $username, $password)
    {
        $profile = 'member';
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO member (fname, lname, username, password, profile) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssss", $fname, $lname, $username, $hashedPassword, $profile);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
