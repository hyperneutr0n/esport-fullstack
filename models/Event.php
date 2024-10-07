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
        return $resultarray;
    }

    public function SelectEventLimit($rowCount, $offset)
    {
        $sql = 'SELECT * FROM event LIMIT ? OFFSET ?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $rowCount, $offset);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
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
        return $resultarray;
    }
}
