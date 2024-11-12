<?php
require_once 'Database.php';

class TeamMembers
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();   
    }

    public function AddTeamMember($idteam, $idmember, $description)
    {
        $sql = 'INSERT INTO team_members VALUES(?,?,?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('iis', $idteam, $idmember, $description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function EditTeamMember($idteam_before, $idmember_before, $idteam_after, $idmember_after, $description_after)
    {
        $sql = 'UPDATE team_members SET idteam=?, idmember=?, description=? WHERE idteam=? AND idmember=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('iisii', $idteam_after, $idmember_after, $description_after, $idteam_before, $idmember_before);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteTeamMember($idteam, $idmember)
    {
        $sql = 'DELETE FROM team_members WHERE idteam=? AND idmember=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $idteam, $idmember);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function SelectTeamMember()
    {
        $sql = 'SELECT tm.*, t.name AS team_name, m.username AS member_username FROM team_members tm INNER JOIN team t ON t.idteam = tm.idteam INNER JOIN member m ON m.idmember = tm.idmember';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function ($row) {
            return array_map(function ($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }

    public function SelectTeamMemberId($idteam, $idmember)
    {
        $sql = 'SELECT * FROM team_members WHERE idteam=? AND idmember=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $idteam, $idmember);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_assoc();
        $resultarray = array_map(function ($value) {
            return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
        }, $resultarray);
        return $resultarray;
    }

    public function SelectTeamMembers($id)
    {
        $sql = 'SELECT member.username
            FROM team_members
            INNER JOIN team on team.idteam = team_members.idteam
            INNER JOIN member on member.idmember = team_members.idmember
            WHERE team.idteam = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function ($row) {
            return array_map(function ($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);

        return $resultarray;
    }
}
