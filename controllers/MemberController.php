<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Member.php';
require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../models/TeamMembers.php';

class MemberController
{
    private $model;

    public function __construct()
    {
        $this->model = new Member();
    }

    public function showHome()
    {
        $gameModel = new Game();
        $result = $gameModel->SelectGameAndTeam();
        $gameListWithTeams = [];

        $teamMemberModel = new TeamMembers();

        foreach ($result as $row) {
            $gameId = $row['idgame'];

            if (!isset($gameListWithTeams[$gameId])) {
                $gameListWithTeams[$gameId] = [
                    'name' => $row['game_name'],
                    'description' => $row['description'],
                    'teams' => [],
                ];
            }

            if ($row['team_name'] !== null) {
                $gameListWithTeams[$gameId]['teams'][] = [
                    'idteam' => $row['idteam'],
                    'team_name' => $row['team_name'],
                    'team_members' => $teamMemberModel->SelectTeamMembers($row['idteam']),
                ];
            }
        }

        require_once 'views/home.php';
    }

    public function Login()
    {
        if (Middleware::checkPostMethod()) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($this->model->Login($username, $password)) {
                header("Location: /");
                exit;
            } else {
                header("Location: /member/login?message=Invalid%20username%20or%20password");
                return;
            }
        } else {
            header("Location: /member/login");
        }
    }

    public function Edit()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idmember = $_POST["idmember"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            if ($this->model->EditMember($idmember, $fname, $lname)) {
                header("Location: /admin/member?message=Succesfully%20updated%20member");
            } else {
                header("Location: /admin/member?message=Failed%20updating%20member");
            }
        } else {
            header("Location: /");
        }
    }

    public function Delete()
    {
        if (Middleware::checkAdmin()) {
            $idmember = $_GET["id"];
            if ($this->model->DeleteMember($idmember)) {
                header("Location: /admin/member?message=Succesfully%20deleted%20member");
            } else {
                header("Location: /admin/member?message=Failed%20deleting%20member");
            }
        } else {
            header("Location: /");
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
                header("Location: /?message=Registered%20successfully");
                exit;
            } else {
                header("Location: /member/register?message=Failed%20to%20register");
            }
        } else {
            header("Location: /");
        }
    }

    public function Logout()
    {
        $this->model->Logout();
        header("Location: /?message=You%20are%20logged%20out");
    }

    public function showMemberForm()
    {
        if (Middleware::checkAdmin()) {
            $members = $this->model->SelectMember();
            require_once 'views/admin/read/member.php';
        } else {
            header("Location: /");
        }
    }

    public function showEditMemberForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $member = $this->model->SelectMemberId($id);
            require_once 'views/admin/update/edit_member.php';
        } else {
            header("Location: /");
        }
        // harusnya require once
    }


    public function showLoginForm()
    {
        if (Middleware::checkMember() || Middleware::checkAdmin()) {
            header("Location: /");
            return;
        }
        require_once 'views/login.php';
    }

    public function showRegisterForm()
    {
        if (Middleware::checkMember() || Middleware::checkAdmin()) {
            header("Location: /");
        }
        require_once 'views/register.php';
    }

    public function showAdminHome()
    {
        $check = Middleware::checkAdmin();

        if (!$check) {
            header("Location: /");
            return;
        }
        require_once 'views/admin/home.php';
    }
}
