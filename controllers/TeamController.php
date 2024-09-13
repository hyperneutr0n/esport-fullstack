<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Team.php';
class  TeamController
{
    private $model;

    public function __construct()
    {
        $this->model = new Team();
    }

    public function showTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $teams = $this->model->SelectTeam();
            require_once 'views/admin/read/team.php';
        }
    }

    public function showAddTeamForm(){
        require_once 'views/admin/Create/add_team.php';
    }

    public function addTeam(){
        if(Middleware::checkPostMethod() && Middleware::checkAdmin()){
            $idgame = $_POST['idgame'];
            $name = $_POST['name'];

            $this->model->AddTeam($idgame, $name);
            session_start();
            $_SESSION['message'] = "Tambah berhasil";
        }
    }

    public function editTeam(){
        if(Middleware::checkPostMethod() && Middleware::checkAdmin()){
            $id = $_POST['id'];
            $idgame = $_POST['idgame'];
            $name = $_POST['name'];

            $this->model->editTeam($id, $idgame, $name);
            session_start();
            $_SESSION['message'] = "Edit berhasil";
        }
    }
    
    public function deleteTeam(){
        if(Middleware::checkPostMethod() && Middleware::checkAdmin()){
            $id = $_POST['id'];

            $this->model->DeleteTeam($id);
            session_start();
            $_SESSION['message'] = "Delete berhasil";
        }
    }
}
