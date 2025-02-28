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
        $sql =  'INSERT INTO game (name, description) VALUES (?, ?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $name, $description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateGame($idgame, $name, $description)
    {
        $sql = 'UPDATE game SET name=?, description=? WHERE idgame=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssi', $name, $description, $idgame);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteGame($idgame)
    {
        $sql = 'DELETE FROM game WHERE idgame=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $idgame);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function SelectGame()
    {
        $sql = 'SELECT * FROM game';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function($row) {
            return array_map(function($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }

    public function SelectGameId($id)
    {
        $sql = 'SELECT * FROM game WHERE idgame=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_assoc();
        $resultarray = array_map(function($value) {
            return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
        }, $resultarray);
        return $resultarray;
    }

    public function SelectGameAndTeam()
    {
        $sql = 'SELECT g.idgame, g.name AS game_name, g.description, t.idteam, t.name AS team_name
        FROM game g
        LEFT JOIN team t ON g.idgame = t.idgame
        ORDER BY g.idgame';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function($row) {
            return array_map(function($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }
}
