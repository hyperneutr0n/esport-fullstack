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
        }
    }

    public function showTeamMembersForm()
    {
        if (Middleware::checkAdmin()) {
            $teamMembers = $this->model->SelectTeamMember();
            require_once 'views/admin/read/teammembers.php';
        }
    }

    public function showEditTeamMembersForm()
    {
        if (Middleware::checkAdmin()) {
            $idteam = $_GET["idteam"];
            $idmember = $_GET["idmember"];
            $teammember = $this->model->SelectTeamMemberId($idteam, $idmember);
            $teams = $this->team->SelectTeam();
            $members = $this->member->SelectMember();
            require_once 'views/admin/update/edit_teamMembers.php';
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

            $this->model->EditTeamMember($idteam_before, $idmember_before, $idteam_after, $idmember_after, $description_after);
            session_start();
            $_SESSION['message'] = "Edit berhasil";
        }
    }

    public function deleteTeamMembers()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idteam = $_POST['idteam'];
            $idmember = $_POST['idmember'];

            $this->model->DeleteTeamMember($idteam, $idmember);
            session_start();
            $_SESSION['message'] = "Delete berhasil";
        }
    }

    public function AddTeamMembers()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idteam = $_POST["idteam"];
            $idmember = $_POST["idmember"];
            $description = $_POST["description"];

            $this->model->AddTeamMember($idteam, $idmember, $description);
        }
    }
}
