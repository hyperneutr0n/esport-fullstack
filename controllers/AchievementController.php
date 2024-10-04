<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Achievement.php';
require_once __DIR__ . '/../models/Team.php';

class AchievementController
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
        // harusnya require once
    }

    public function showAddAchievementForm()
    {
        if (Middleware::checkAdmin()) {
            $teams = $this->team->SelectTeam();
            require_once 'views/admin/Create/add_achievement.php';
        }
        // harusnya require once
    }

    public function showEditAchievementForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $teams = $this->team->SelectTeam();
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

            if ($this->model->AddAchievement($idteam, $name, $date, $description)) {
                echo "<script>alert('Achievement Added Successfully');</script>";
            } else {
                echo "<script>alert('Failed to add achievement');</script>";
            }
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
                echo "<script>alert('Invalid date format');</script>";
                die(); 
            }

            $stringdate = $dateObject->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            if ($this->model->EditAchievement($id, $idteam, $name, $stringdate, $description)) {
                echo "<script>alert('Achievement Edited Successfully');</script>";
            } else {
                echo "<script>alert('Failed to edit achievement');</script>";
            }
        }
    }

    public function deleteAchievement()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            if ($this->model->DeleteAchievement($id)) {
                echo "<script>alert('Achievement Deleted Successfully');</script>";
            } else {
                echo "<script>alert('Failed to delete achievement');</script>";
            }
        } else {
            echo "<script>alert('You do not have permission to delete achievements');</script>";
        }
    }
}
