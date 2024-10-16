    <?php
    require_once 'Database.php';

    class JoinProposal
    {
        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance()->getConnection();
        }

        public function AddJoinProposal($idteam, $idmember, $description, $status)
        {
            $sql = 'INSERT INTO join_proposal (idmember, idteam, description, status) VALUES (?,?,?,?)';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('iiss', $idmember, $idteam, $description, $status);


            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function EditJoinProposal($id, $idteam, $idmember, $description, $status)
        {
            $sql = 'UPDATE join_proposal SET idteam=?, idmember=?, description=?, status=? WHERE idjoin_proposal=?';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('iissi', $idteam, $idmember, $description, $status, $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function DeleteJoinProposal($id)
        {
            $sql = 'DELETE FROM join_proposal WHERE idjoin_proposal=?';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('i', $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function SelectJoinProposal()
        {
            $sql = 'SELECT jp.*, m.username AS member_username, t.name AS team_name FROM join_proposal jp INNER JOIN member m ON m.idmember=jp.idmember INNER JOIN team t ON t.idteam=jp.idteam';

            $resultset = $this->db->query($sql);
            $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
            $resultarray = array_map(function ($row) {
                return array_map(function ($value) {
                    return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
                }, $row);
            }, $resultarray);
            return $resultarray;
        }

        public function SelectJoinProposalId($id)
        {
            $sql = 'SELECT * FROM join_proposal WHERE idjoin_proposal=?';
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
    }
