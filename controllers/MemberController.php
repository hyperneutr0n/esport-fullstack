<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Member.php';

class MemberController
{
    private $model;

    public function __construct()
    {
        $this->model = new Member();
    }

    public function Login()
    {
        if (Middleware::checkPostMethod()) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if (!$this->model->Login($username, $password)) {
                //require_once 'views/home.php';
            }
            //require_once 'views/home.php';
        }
        //require_once 'views/home.php';
    }

    public function Register()
    {

        if (Middleware::checkPostMethod()) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            if (!$this->model->Register($fname, $lname, $username, $password)) {
                require_once 'views/register.php';
            }
            header("Location: /");
            require_once 'views/register.php';
        }
    }

    public function Logout()
    {
        if (Middleware::checkPostMethod()) {
            $this->model->Logout();
            require_once 'views/home.php';
        }
    }

    public function showMemberForm()
    {
        if (Middleware::checkAdmin()) {
            $members = $this->model->SelectMember();
            require_once 'views/admin/read/member.php';
        }
    }


    public function showLoginForm()
    {
        if (Middleware::checkMember() || Middleware::checkAdmin()) {
            require_once 'views/home.php';
        }
        require_once 'views/login.php';
    }

    public function showRegisterForm()
    {
        if (Middleware::checkMember() || Middleware::checkAdmin()) {
            require_once 'views/home.php';
        }
        require_once 'views/register.php';
    }

    public function showAdminHome()
    {
        $check = Middleware::checkAdmin();

        if (!$check) {
            require_once 'views/home.php';
        }
        require_once 'views/admin/home.php';
    }
}
