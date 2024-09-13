<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Achievement.php';
class  AchievementController
{
    private $model;

    public function __construct()
    {
        $this->model = new Achievement();
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
        require_once 'views/admin/Create/add_achievement.php';
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
            $description = $_POST['description'];

            $this->model->EditAchievement($id, $idteam, $name, $date, $description);
            session_start();
            $_SESSION['message'] = "Edit berhasil";
        }
    }

    public function deleteAchievement()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];

            $this->model->DeleteAchievement($id);
            session_start();
            $_SESSION['message'] = "Delete berhasil";
        }
    }
}
