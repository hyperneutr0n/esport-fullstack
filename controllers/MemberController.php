<?php

class Member {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function addAccount($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO accounts (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
