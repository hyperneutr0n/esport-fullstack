<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Team.php';
require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/Achievement.php';

class  TeamController
{
    private $model;
    private $game;
    private $event;
    private $achievement;

    public function __construct()
    {
        $this->model = new Team();
        $this->game = new Game();
        $this->event = new Event();
        $this->achievement = new Achievement();
    }

    public function showTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $teams = $this->model->SelectTeam();
            require_once 'views/admin/read/team.php';
        } else {
            header("Location: /");
        }
    }

    public function showAddTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $games = $this->game->SelectGame();
            require_once 'views/admin/create/add_team.php';
        } else {
            header("Location: /");
        }
    }

    public function showEditTeamForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $games = $this->game->SelectGame();
            $team = $this->model->SelectTeamId($id);
            require_once 'views/admin/update/edit_team.php';
        } else {
            header("Location: /");
        }
    }

    public function showTeamDetailsForm()
    {
        if (Middleware::checkAdmin()) {
            $idteam = $_GET["id"];
            $games = $this->game->SelectGame();
            $team = $this->model->SelectTeamId($idteam);
            $events = $this->event->SelectEventWithTeam($idteam);
            $achievements = $this->achievement->SelectAchievementWithTeam($idteam);

            require_once 'views/admin/details/detail_team.php';
        } else {
            header("Location: /");
        }
    }
    public function addTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idgame = $_POST['idgame'];
            $name = $_POST['name'];
            $logo = $_FILES['logo'];

            $generatedID = $this->model->AddTeam($idgame, $name);
            if ($generatedID) {
                $validation = $this->model->ImageValidation($generatedID, $logo);
                if ($validation) {
                    $message = rawurlencode('Successfully added team');
                    header("Location: /admin/team?id=$generatedID&message=$message");
                } else {
                    $message = rawurlencode('Successfully added team, but failed to upload image');
                    header("Location: /admin/team?id=$generatedID&message=$message");
                }
            } else {
                header('Location: /admin/team?message=Error%20adding%20new%20team');
            }
        } else {
            header("Location: /");
        }
    }

    public function editTeam()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];
            $idgame = $_POST['idgame'];
            $name = $_POST['name'];
            $logo = $_FILES['logo'];
            if ($this->model->editTeam($id, $idgame, $name)) {
                if (isset($logo)) {
                    $this->model->ImageValidation($id, $logo);
                }
                header('Location: /admin/team?message=Successfully%20edit%20team');
            } else {
                header('Location: /admin/team?message=Error%20editing%20team');
            }
        } else {
            header("Location: /");
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

            header('Location: /admin/team');
        } else {
            header("Location: /");
        }
    }

    public function showMemberTeamForm()
    {
        if (Middleware::checkMember()) {
            $id = $_SESSION["id"];
            $results = $this->model->SelectJoinedTeamDetails($id);
            $teamList = [];

            $tm = new TeamMembers();
            foreach ($results as $row) {
                $idteam = $row['team_id'];

                if (!isset($teamList[$idteam])) {
                    $teamList[$idteam] = [
                        "idteam" => $row['team_id'],
                        "team_name" => $row['team_name'],
                        "team_members" => $tm->SelectTeamMembers($row['team_id']),
                        "joined_events" => [],
                        "team_achievements" => []
                    ];
                }

                if (!isset($row['event_id'])) {
                    $teamList[$idteam]['joined_events'][] = [
                        "idevent" => $row['event_id'],
                        "event_name" => $row['event_name'],
                        "event_date" => $row['event_date']
                    ];
                }

                if (!isset($row['achievement_id'])) {
                    $teamList[$idteam]['team_achievements'][] = [
                        "idachievement" => $row['achievement_id'],
                        "achievement_name" => $row['achievement_name'],
                        "achievement_date" => $row['achievement_date']
                    ];
                }
            }


            require_once 'views/member/team.php';
        }
    }
}
