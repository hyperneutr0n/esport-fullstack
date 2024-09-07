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

    public function Login()
    {
        if ($this->middleware->checkPostMethod()) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if (!$this->model->Login($username, $password)) {
                require_once 'views/home.php';
            }
            require_once 'views/home.php';
        }
        require_once 'views/home.php';
    }

    public function Register()
    {

        if ($this->middleware->checkPostMethod()) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            if (!$this->model->Register($fname, $lname, $username, $password)) {
                require_once 'views/register.php';
            }
            require_once 'views/register.php';
        }
    }

    public function Logout()
    {
        if ($this->middleware->checkPostMethod()) {
            $this->model->Logout();
            require_once 'views/home.php';
        }
    }

    public function showLoginForm()
    {
        if ($this->middleware->checkMember() || $this->middleware->checkAdmin()) {
            require_once 'views/home.php';
        }
        require_once 'views/login.php';
    }

    public function showRegisterForm()
    {
        if ($this->middleware->checkMember() || $this->middleware->checkAdmin()) {
            require_once 'views/home.php';
        }
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
