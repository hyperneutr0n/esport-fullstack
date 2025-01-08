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
            return $this->db->insert_id;
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

    public function ImageValidation($id, $image)
    {
        if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
            $imagePath = $image['tmp_name'];
            $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);

            $tmpDir = __DIR__ . '/../images/tmp/';
            $publicDir = __DIR__ . '/../images/public/';

            $tmpFilePath = $tmpDir . basename($image['name']);

            if (!move_uploaded_file($imagePath, $tmpFilePath)) {
                return false;
            }

            if (strtolower($fileExtension) !== 'jpg') {
                unlink($imagePath);
                return false;
            }

            $newName = $id . '.jpg';
            $publicFilePath = $publicDir . $newName;

            if (!rename($tmpFilePath, $publicFilePath)) {
                return false;
            }

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
            $imagePath = __DIR__ . "/../images/public/$id.jpg";
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            return true;
        } else {
            return false;
        }
    }

    public function SelectTeam()
    {
        $sql = 'SELECT t.*, g.name AS game_name FROM team t INNER JOIN game g ON g.idgame=t.idgame';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function ($row) {
            return array_map(function ($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }

    public function SelectTeamId($id)
    {
        $sql = 'SELECT t.*, g.name AS game_name FROM team t INNER JOIN game g ON g.idgame=t.idgame WHERE idteam=?';
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

    public function SelectTeamWithAchievement()
    {
        $sql = "SELECT team.* FROM achievement INNER JOIN team on achievement.idteam = team.idteam;";
        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function ($row) {
            return array_map(function ($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }

    public function SelectTeamInTeamMembers($id)
    {
        $sql = "SELECT team.* FROM team_members INNER JOIN team on team.idteam = team_members.idteam WHERE idmember=?;";
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

    public function SelectJoinedTeamDetails($id)
    {
        $sql =
            'SELECT 
                t.idteam AS team_id,
                t.name AS team_name,
                e.idevent AS event_id,
                e.name AS event_name,
                e.date AS event_date,
                a.idachievement AS achievement_id,
                a.name AS achievement_name,
                a.date AS achievement_date
            FROM 
                team_members tm
            JOIN 
                team t ON tm.idteam = t.idteam
            LEFT JOIN 
                event_teams et ON t.idteam = et.idteam
            LEFT JOIN 
                event e ON et.idevent = e.idevent
            LEFT JOIN 
                achievement a ON t.idteam = a.idteam
            WHERE 
                tm.idmember = ?';

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

    public function SelectTeamNotJoined($id)
    {
        $sql = 'SELECT t.*, g.name as game_name
        FROM team t
        INNER JOIN game g ON g.idgame=t.idgame
        LEFT JOIN team_members tm ON t.idteam = tm.idteam AND tm.idmember = ?
        WHERE tm.idmember IS NULL;';
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
