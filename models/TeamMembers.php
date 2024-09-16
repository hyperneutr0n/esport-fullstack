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
        $sql = 'SELECT * FROM team_members';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
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
        return $resultarray;
    }

   
}
