    <?php
    require_once 'Database.php';

    class EventTeams
    {
        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance()->getConnection();
        }

        public function AddEventTeam($idevent, $idteam)
        {
            $sql = 'INSERT INTO event_teams VALUES (?,?)';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ii', $idevent, $idteam);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function EditEventTeam($idevent_before, $idteam_before, $idevent_after, $idteam_after)
        {
            $sql = 'UPDATE event_teams SET idevent=?, idteam=? WHERE idevent=? AND idteam=?';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('iiii', $idevent_after, $idteam_after, $idevent_before, $idteam_before);


            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function DeleteEventTeam($idevent, $idteam)
        {
            $sql = 'DELETE FROM event_teams WHERE idevent=? AND idteam=?';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ii', $idevent, $idteam);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function SelectEventTeam()
        {
            $sql = 'SELECT * FROM event_teams';

            $resultset = $this->db->query($sql);
            $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
            return $resultarray;
        }

        public function SelectEventTeamId($idevent, $idteam)
        {
            $sql = 'SELECT * FROM event_teams WHERE idevent=? AND idteam=?';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ii', $idevent, $idteam);
            $stmt->execute();

            $resultset = $stmt->get_result();
            $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
            return $resultarray;
        }
    }
