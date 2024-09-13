<?php
require_once 'Database.php';

class Team
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function AddTeam($idgame, $name)
    {
        $sql = 'INSERT INTO team (idgame, name) VALUES (?,?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('is', $idgame, $name);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function EditTeam($id, $idgame, $name)
    {
        $sql = 'UPDATE team SET idgame=?, name=? WHERE idteam=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('isi', $idgame, $name, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteTeam($id)
    {
        $sql = 'DELETE FROM team WHERE idteam=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function SelectTeam()
    {
        $sql = 'SELECT * FROM team';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultarray;
    }

    public function SelectTeamId($id)
    {
        $sql = 'SELECT * FROM team WHERE idteam=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultarray;
    }
}
