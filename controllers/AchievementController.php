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
}
