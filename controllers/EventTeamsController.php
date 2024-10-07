<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/EventTeams.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/Team.php';

class EventTeamsController
{
    private $model;
    private $event;
    private $team;

    public function __construct()
    {
        $this->model = new EventTeams();
        $this->event = new Event();
        $this->team = new Team();
    }

    public function showEventTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $eventTeams = $this->model->SelectEventTeam();
            require_once 'views/admin/read/eventteams.php';
        } else {
            header("Location: /");
        }
    }

    public function showAddEventTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $events = $this->event->SelectEvent();
            $teams = $this->team->SelectTeam();
            require_once 'views/admin/create/add_eventTeams.php';
        } else {
            header("Location: /");
        }
    }

    public function showEditEventTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $idevent = $_GET["idevent"];
            $idteam = $_GET["idteam"];
            $events = $this->event->SelectEvent();
            $teams = $this->team->SelectTeam();
            $eventteam = $this->model->SelectEventTeamId($idevent, $idteam);
            require_once 'views/admin/update/edit_eventTeams.php';
        } else {
            header("Location: /");
        }
    }

    public function addEventTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idevent = $_POST["idevent"];
            $idteam = $_POST["idteam"];

            if ($this->model->AddEventTeam($idevent, $idteam)) {
                header('Location: /admin/eventteams?message=Succesfully%20added%20event%20teams');
            } else {
                header('Location: /admin/event?message=Failed%20adding%20event%20teams');
            }
        } else {
            header("Location: /");
        }
    }

    public function editEventTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idevent_before = $_POST['idevent_before'];
            $idteam_before = $_POST['idteam_before'];
            $idevent_after = $_POST['idevent_after'];
            $idteam_after = $_POST['idteam_after'];

            if ($this->model->EditEventTeam($idevent_before, $idteam_before, $idevent_after, $idteam_after)) {
                header('Location: /admin/eventteams?message=Succesfully%20updated%20event%20teams');
            } else {
                header('Location: /admin/event?message=Failed%20updating%20event%20teams');
            }
            // session_start();
            // $_SESSION['message'] = "Edit berhasil";
        } else {
            header("Location: /");
        }
    }

    public function deleteEventTeam()
    {
        if (Middleware::checkAdmin()) {
            $idevent = $_GET['idevent'];
            $idteam = $_GET['idteam'];

            if ($this->model->DeleteEventTeam($idevent, $idteam)) {
                header('Location: /admin/eventteams?message=Succesfully%20deleted%20event%20teams');
            } else {
                header('Location: /admin/event?message=Failed%20deleting%20event%20teams');
            }

            // session_start();
            // $_SESSION['message'] = "Delete berhasil";
        } else {
            header("Location: /");
        }
    }
}
