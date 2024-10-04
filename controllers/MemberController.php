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

            if ($this->model->Login($username, $password)) {
                echo "<script>alert('Login successful!');</script>"; 
                header("Location: /"); 
                exit;
            } else {
                echo "<script>alert('Invalid username or password.');</script>";
                require_once 'views/login.php'; 
                return;
            }
        }
        require_once 'views/login.php';
    }

    public function Edit()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idmember = $_POST["idmember"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            if ($this->model->EditMember($idmember, $fname, $lname)) {
                echo "<script>alert('Member updated successfully.');</script>"; 
            } else {
                echo "<script>alert('Failed to update member.');</script>"; 
            }
        }
    }

    public function Delete()
    {
        if (Middleware::checkAdmin()) {
            $idmember = $_GET["id"];
            if ($this->model->DeleteMember($idmember)) {
                echo "<script>alert('Member deleted successfully.');</script>"; 
            } else {
                echo "<script>alert('Failed to delete member.');</script>"; 
            }
        }
    }

    public function Register()
    {

        if (Middleware::checkPostMethod()) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($this->model->Register($fname, $lname, $username, $password)) {
                echo "<script>alert('Registration successful! You can now log in.');</script>"; 
                header("Location: /"); 
                exit;
            } else {
                echo "<script>alert('Failed to register. Please try again.');</script>"; 
                require_once 'views/register.php'; 
                return;
            }
        }
    }

    public function Logout()
    {
        $this->model->Logout();
        echo "<script>alert('You have logged out.');</script>";
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
            return;
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
            return;
        }
        require_once 'views/admin/home.php';
    }
}
