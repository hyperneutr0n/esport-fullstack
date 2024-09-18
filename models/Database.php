<?php
require_once 'database.config.php';

class Database
{

    private static $instance = null;
    private $conn;


    public function __construct()
    {
        $host = 'localhost';
        $dbName = 'esport';
        $username = 'root';
        $password = '';
        $this->conn = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
