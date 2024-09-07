<?php

require_once 'Database.php';


class Achievement
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
}
