<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/TeamMembers.php';
require_once __DIR__ . '/../models/Team.php';
require_once __DIR__ . '/../models/Member.php';
class TeamMembersController
{
    private $model;

    private $team;

    private $member;

    public function __construct()
    {
        $this->model = new TeamMembers();
        $this->team = new Team();
        $this->member = new Member();
    }

    public function showAddTeamMemberForm()
    {
        if (Middleware::checkAdmin()) {
            $teams = $this->team->SelectTeam();
            $members = $this->member->SelectMember();

            require_once 'views/admin/create/add_teamMembers.php';
        } else {
            header("Location: /");
        }
    }

    public function showTeamMembersForm()
    {
        if (Middleware::checkAdmin()) {
            $teamMembers = $this->model->SelectTeamMember();
            require_once 'views/admin/read/teammembers.php';
        } else {
            header("Location: /");
        }
    }

    public function showEditTeamMembersForm()
    {
        if (Middleware::checkAdmin()) {
            $idteam = $_GET["idteam"];
            $idmember = $_GET["idmember"];
            $teammember = $this->model->SelectTeamMemberId($idteam, $idmember);
            $teams = $this->team->SelectTeamInTeamMembers();
            $members = $this->member->SelectMember();
            require_once 'views/admin/update/edit_teamMembers.php';
        } else {
            header("Location: /");
        }
    }

    public function editTeamMembers()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idteam_before = $_POST['idteam_before'];
            $idmember_before = $_POST['idmember_before'];
            $idteam_after = $_POST['idteam_after'];
            $idmember_after = $_POST['idmember_after'];
            $description_after = $_POST['description_after'];

            if ($this->model->EditTeamMember($idteam_before, $idmember_before, $idteam_after, $idmember_after, $description_after)) {
                header('Location: /admin/teammembers?message=Successfully%20updated%20team%20members');
            } else {
                header('Location: /admin/teammembers?message=Failed%20updating%20team%20members');
            }
            // session_start();
            // $_SESSION['message'] = "Edit berhasil";
        } else {
            header("Location: /");
        }
    }

    public function deleteTeamMembers()
    {
        if (Middleware::checkAdmin()) {
            $idteam = $_GET['idteam'];
            $idmember = $_GET['idmember'];

            if ($this->model->DeleteTeamMember($idteam, $idmember)) {
                header('Location: /admin/teammembers?message=Successfully%20deleted%20team%20members');
            } else {
                header('Location: /admin/teammembers?message=Failed%20deleting%20team%20members');
            }
            // session_start();
            // $_SESSION['message'] = "Delete berhasil";
        } else {
            header("Location: /");
        }
    }

    public function AddTeamMembers()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idteam = $_POST["idteam"];
            $idmember = $_POST["idmember"];
            $description = $_POST["description"];

            if ($this->model->AddTeamMember($idteam, $idmember, $description)) {
                header('Location: /admin/teammembers?message=Successfully%20added%20team%20members');
            } else {
                header('Location: /admin/teammembers?message=Error%20adding%20new%20team%20members');
            }
        } else {
            header("Location: /");
        }
    }
}
