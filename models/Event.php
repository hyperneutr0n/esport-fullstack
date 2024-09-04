<?php

class Event
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function addEvent($name, $date, $description)
    {
        $sql = "INSERT INTO event (name, date, description) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $name, $date, $description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
