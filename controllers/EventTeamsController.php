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
            $listEventTeams = $this->model->SelectEventTeam();
            require_once 'views/admin/read/eventteams.php';
        }
    }

    public function showAddEventTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $events = $this->event->SelectEvent();
            $teams = $this->team->SelectTeam();
            require_once 'views/admin/add/add_eventTeams.php';
        }
    }
    public function showEditEventTeamForm()
    {
        require_once 'views/admin/create/add_eventTeams.php';
    }

    public function editEventTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idevent_before = $_POST['idevent_before'];
            $idteam_before = $_POST['idteam_before'];
            $idevent_after = $_POST['idevent_after'];
            $idteam_after = $_POST['idteam_after'];

            $this->model->EditEventTeam($idevent_before, $idteam_before, $idevent_after, $idteam_after);
            session_start();
            $_SESSION['message'] = "Edit berhasil";
        }
    }

    public function deleteEventTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idevent = $_POST['idevent'];
            $idteam = $_POST['idteam'];
            $this->model->DeleteEventTeam($idevent, $idteam);

            session_start();
            $_SESSION['message'] = "Delete behasil";
        }
    }
}
