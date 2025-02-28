<?php
require_once 'Database.php';

class Event
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function AddEvent($name, $date, $description)
    {
        $sql = 'INSERT INTO event (name, date, description) VALUES (?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sss', $name, $date, $description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function EditEvent($id, $name, $date, $description)
    {
        $sql = 'UPDATE event SET name=?, date=?, description=? WHERE idevent=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssi', $name, $date, $description, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteEvent($id)
    {
        $sql = 'DELETE FROM event WHERE idevent=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function SelectEvent()
    {
        $sql = 'SELECT * FROM event';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function ($row) {
            return array_map(function ($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }

    public function SelectEventId($id)
    {
        $sql = 'SELECT * FROM event WHERE idevent=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_assoc();
        $resultarray = array_map(function ($value) {
            return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
        }, $resultarray);
        return $resultarray;
    }

    public function SelectEventWithTeam($idteam)
    {
        $sql = 'SELECT e.*, et.idteam FROM event e INNER JOIN event_teams et ON e.idevent=et.idevent WHERE idteam=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $idteam);
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
    public function SelectEventWithTeamId($id)
    {
        $sql = '
        SELECT event.* FROM event INNER JOIN event_teams on event_teams.idevent = event.idevent 
        INNER JOIN team on team.idteam =  event_teams.idteam 
        INNER JOIN team_members on team_members.idteam = team.idteam 
        INNER JOIN member on member.idmember = team_members.idmember 
        WHERE team.idteam = ?;
        ';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
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

    public function SelectEventWithMembers($id)
    {
        $sql = '
        SELECT event.* FROM event INNER JOIN event_teams on event_teams.idevent = event.idevent 
        INNER JOIN team on team.idteam =  event_teams.idteam 
        INNER JOIN team_members on team_members.idteam = team.idteam 
        INNER JOIN member on member.idmember = team_members.idmember 
        WHERE member.idmember = ?;
        ';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
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

    public function SelectTeamEvent($id)
    {
        $sql = 'SELECT DISTINCT team.*, event.* FROM team_members INNER JOIN team on team.idteam = team_members.idteam INNER JOIN event_teams on team.idteam = event_teams.idteam INNER JOIN event on event_teams.idevent = event.idevent WHERE team.idteam = ?;';
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
