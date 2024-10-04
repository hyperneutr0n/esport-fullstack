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
                session_start();
                $_SESSION['message'] = "Tim berhasil ditambahkan";
                $_SESSION['message_type'] = "sukses";
            } else {
                session_start();
                $_SESSION['message'] = "Gagal menambahkan tim";
                $_SESSION['message_type'] = "error";
            }

            header('Location: /admin/teams');
        }
    }

    public function editTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];
            $idgame = $_POST['idgame'];
            $name = $_POST['name'];
            if ($this->model->editTeam($id, $idgame, $name)) {
                session_start();
                $_SESSION['message'] = "Tim berhasil diedit";
                $_SESSION['message_type'] = "sukses";
            } else {
                session_start();
                $_SESSION['message'] = "Gagal menambahkan tim";
                $_SESSION['message_type'] = "error";
            }

            header('Location: /admin/teams');
        }
    }

    public function deleteTeam()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            if ($this->model->DeleteTeam($id)) {
                session_start();
                $_SESSION['message'] = "Tim terhapus";
                $_SESSION['message_type'] = "success";
            } else {
                session_start();
                $_SESSION['message'] = "Gagal menghapus";
                $_SESSION['message_type'] = "error";
            }

            header('Location: /admin/teams'); //
        }
    }
}
