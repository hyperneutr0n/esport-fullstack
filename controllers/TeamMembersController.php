<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/TeamMembers.php';
class TeamMembersController
{
    private $model;

    public function __construct()
    {
        $this->model = new TeamMembers();
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
        require_once 'views/admin/Create/add_teamMembers.php';
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

    public function deleteTeamMembers(){
        if(Middleware::checkPostMethod() && Middleware::checkAdmin()){
            $idteam = $_POST['idteam'];
            $idmember = $_POST['idmember'];

            $this->model->DeleteTeamMember($idteam, $idmember);
            session_start();
            $_SESSION['message']="Delete berhasil";
        }
    }

    
}
