<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Achievement.php';
require_once __DIR__ . '/../models/Team.php';
class  AchievementController
{
    private $model;
    private $team;

    public function __construct()
    {
        $this->model = new Achievement();
        $this->team = new Team();
    }

    public function showAchievementForm()
    {
        if (Middleware::checkAdmin()) {
            $achievements = $this->model->SelectAchievement();
            require_once 'views/admin/read/achievement.php';
        }
    }

    public function showAddAchievementForm()
    {
        if (Middleware::checkAdmin()) {
            $teams = $this->team->SelectTeam();
            require_once 'views/admin/Create/add_achievement.php';
        }
    }

    public function showEditAchievementForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $teams = $this->team->SelectTeamWithAchievement();
            $achievement = $this->model->SelectAchievementId($id);
            require_once 'views/admin/update/edit_achievement.php';
        }
        // harusnya require once
    }

    public function addAchievement()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $idteam = $_POST['idteam'];
            $name = $_POST['name'];
            $date = $_POST['date'];
            $description = $_POST['description'];

            $this->model->AddAchievement($idteam, $name, $date, $description);
            session_start();
            $_SESSION['message'] = "berhasil";
        }
    }

    public function editAchievement()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];
            $idteam = $_POST['idteam'];
            $name = $_POST['name'];
            $date = $_POST['date'];

            $dateObject = DateTime::createFromFormat('Y-m-d', $date);
            if (!$dateObject) {
                // Handle invalid date format
                die("Invalid date format");
            }

            // Format the date to the required format
            $stringdate = $dateObject->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            $this->model->EditAchievement($id, $idteam, $name, $stringdate, $description);
            // session_start();
            // $_SESSION['message'] = "Edit berhasil";
        }
    }

    public function deleteAchievement()
    {
        if (Middleware::checkAdmin()) {
            $id = $_POST['id'];

            $this->model->DeleteAchievement($id);
            // session_start();
            // $_SESSION['message'] = "Delete berhasil";
        }
    }
}
