<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/EventTeams.php';
class EventTeamsController
{
    private $model;

    public function __construct()
    {
        $this->model = new EventTeams();
    }

    public function showJoinProposalForm()
    {
        if (Middleware::checkAdmin()) {
            $eventTeams = $this->model->SelectEventTeam();
            require_once 'views/admin/read/eventteams.php';
        }
    }
}
