<?php

class Member
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
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
