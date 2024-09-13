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
}
