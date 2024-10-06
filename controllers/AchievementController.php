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

    public function showMemberAchievementForm()
    {
        if (Middleware::checkMember()) {
            $achievements = $this->model->SelectAchievement();
            //buat method di modelnya supaya nnti achievement yg muncul hnya yg berelasi 
            require_once 'views/member/achievement.php';
        }
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
                header("Location: /admin/achievement?message=Successfully%20added%20achievement");
            } else {
                header("Location: /admin/achievement?message=Error%20adding%20achievement");
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
                header("Location: /admin/achievement?message=Edit%20Achievement%20success");
            } else {
                header("Location: /admin/achievement?message=Error%20editing%20achievement");
            }
        }
    }

    public function deleteAchievement()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            if ($this->model->DeleteAchievement($id)) {
                header("Location: /admin/achievement?message=Delete%20Achievement%20success");
            } else {
                header("Location: /admin/achievement?message=Error%20deleting%20achievement");
            }
        } else {
            header("Location: /");
        }
    }
}
