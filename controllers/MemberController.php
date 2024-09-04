<?php
require_once 'Middleware.php';

class MemberController
{
    private $model;
    private $middleware;

    public function __construct($model)
    {
        $this->model = $model;
        $this->middleware = new Middleware();
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

    public function Logout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
            $this->model->Logout();
            require_once 'views/home.php';
        }
    }


    public function showRegisterForm()
    {
        require_once 'views/register.php';
    }

    public function showAdminHome()
    {
        $check = $this->middleware->checkAdmin();

        if (!$check) {
            require_once 'views/home.php';
        }
        require_once 'views/admin/home.php';
    }
}
