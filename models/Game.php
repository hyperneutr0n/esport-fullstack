<?php
require_once 'Database.php';

class Game
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function AddGame($name, $description)
    {
        $sql =  "INSERT INTO game (name, description) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $name, $description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateGame($idgame, $name, $description)
    {
        $sql = "UPDATE game SET name = ?, description = ?, WHERE idgame =?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssi", $name, $description, $idgame);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function DeleteGame($idgame)
    {
        $sql = "DELETE FROM game WHERE idgame = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idgame);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
