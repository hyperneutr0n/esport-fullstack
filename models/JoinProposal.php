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
        $stmt->bind_param('iiss', $idteam, $idmember, $description, $status);

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
        $sql = 'SELECT * FROM join_proposal';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultarray;
    }

    public function SelectJoinProposalId($id)
    {
        $sql = 'SELECT * FROM join_proposal WHERE idjoin_proposal=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultarray;
    }
}
