<?php
require_once 'Middleware.php';
require_once '../models/Event.php';

class EventController
{
    private $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function addEvent()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $stringdate = $date->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            $this->model->AddEvent($name, $stringdate, $description); //blm selesai
        }
    }

    public function editEvent()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $date = $_POST['date'];
            $stringdate = $date->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            $this->model->EditEvent($id, $name, $stringdate, $description);
        }
    }

    public function deleteEvent()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];

            $this->model->EditEvent($id);
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
