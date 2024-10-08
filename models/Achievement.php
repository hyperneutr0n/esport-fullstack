<?php

require_once 'Database.php';


class Achievement
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function AddAchievement($idteam, $name, string $date, $description)
    {
        $sql = 'INSERT INTO achievement (idteam, name, date, description) VALUES (?,?,?,?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('isss', $idteam, $name, $date, $description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function EditAchievement($id, $idteam, $name, string $date, $description)
    {
        $sql = 'UPDATE achievement SET idteam=?, name=?, date=?, description=? WHERE idachievement=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('isssi', $idteam, $name, $date, $description, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteAchievement($id)
    {
        $sql = 'DELETE FROM achievement WHERE idachievement=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function SelectAchievement()
    {
        $sql = 'SELECT a.*, t.name AS team_name FROM achievement a INNER JOIN team t ON t.idteam=a.idteam';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultarray;
    }

    public function SelectAchievementId($id)
    {
        $sql = 'SELECT * FROM achievement WHERE idachievement=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_assoc();
        return $resultarray;
    }

    public function SelectAchievementWithTeam($idteam)
    {
        $sql = 'SELECT * FROM achievement WHERE idteam=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $idteam);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultarray;
    }

    public function SelectAchievementWithmember($id)
    {
        $sql = 'SELECT*FROM achievement 
        INNER JOIN team on team.idteam = achievement.idteam 
        INNER JOIN team_members on team_members.idteam = team.idteam 
        INNER JOIN member on member.idmember = team_members.idmember 
        WHERE member.idmember=?;
        ';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);

        return $resultarray;
    }
}
