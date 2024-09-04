<?php

class MemberController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function Register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            $this->model->Register($fname, $lname, $username, $password);
        }
    }

    public function showRegisterForm()
    {
        require_once 'views/register.php';
    }
}
