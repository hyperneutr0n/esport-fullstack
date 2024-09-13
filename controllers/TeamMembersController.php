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
}
