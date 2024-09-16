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

    public function Edit()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idmember = $_POST["idmember"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $this->model->EditMember($idmember, $fname, $lname);
        }
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
        $this->model->Logout();
        require_once 'views/home.php';
    }

    public function showMemberForm()
    {
        if (Middleware::checkAdmin()) {
            $members = $this->model->SelectMember();
            require_once 'views/admin/read/member.php';
        }
    }

    public function showEditMemberForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $member = $this->model->SelectMemberId($id);
            require_once 'views/admin/update/edit_member.php';
        }
        // harusnya require once
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
