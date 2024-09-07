<?php
require_once 'Middleware.php';

class EventController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function addEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
            $name = $_POST["name"];
            $date = $_POST["date"];
            $stringdate = $date->format('Y-m-d H:i:s');
            $description = $_POST["description"];

            $this->model->AddEvent($name, $stringdate, $description);
        }
    }

    public function showAddEventForm()
    {
        require_once 'views/admin/add_event.php';
    }
    public function showEventForm()
    {
        // require_once 'views/admin/event.php';
    }
}
