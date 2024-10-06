<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Team.php';
require_once __DIR__ . '/../models/Game.php';
class  TeamController
{
    private $model;
    private $game;

    public function __construct()
    {
        $this->model = new Team();
        $this->game = new Game();
    }

    public function showTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $teams = $this->model->SelectTeam();
            require_once 'views/admin/read/team.php';
        }
    }

    public function showAddTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $games = $this->game->SelectGame();
            require_once 'views/admin/Create/add_team.php';
        }
    }

    public function showEditTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $games = $this->game->SelectGame();
            $team = $this->model->SelectTeamId($id);
            require_once 'views/admin/update/edit_team.php';
        }
        //form nya memang lom ada ya?
    }

    public function addTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idgame = $_POST['idgame'];
            $name = $_POST['name'];

            if ($this->model->AddTeam($idgame, $name)) {
                header('Location: /admin/team?message=Successfully%20added%20team');
            } else {
                header('Location: /admin/team?message=Error%20adding%20new%20team');
            }
        }
    }

    public function editTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];
            $idgame = $_POST['idgame'];
            $name = $_POST['name'];
            if ($this->model->editTeam($id, $idgame, $name)) {
                header('Location: /admin/team?message=Successfully%20edit%20team');
            } else {
                header('Location: /admin/team?message=Error%20editing%20team');
            }

            header('Location: /admin/team');
        }
    }

    public function deleteTeam()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            if ($this->model->DeleteTeam($id)) {
                header('Location: /admin/team?message=Successfully%20deleted%20team');
            } else {
                header('Location: /admin/team?message=Error%20deleting%20team');
            }

            header('Location: /admin/team'); //
        }
    }
}
