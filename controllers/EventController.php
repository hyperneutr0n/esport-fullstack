<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Event.php';


class EventController
{
    private $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function AddEvent()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $name = $_POST['name'];
            $date = $_POST['date'];

            // Convert the date string to a DateTime object
            $dateObject = DateTime::createFromFormat('Y-m-d', $date);
            if (!$dateObject) {
                // Handle invalid date format
                die("Invalid date format");
            }

            // Format the date to the required format
            $stringdate = $dateObject->format('Y-m-d H:i:s');

            $description = $_POST['description'];

            $this->model->AddEvent($name, $stringdate, $description);
            session_start();
            $_SESSION['message'] = "berhasil";
        }
    }


    public function EditEvent()
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

    public function DeleteEvent()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];

            $this->model->DeleteEvent($id);
        }
    }

    public function showEventForm()
    {
        if (Middleware::checkAdmin()) {
            $events = $this->model->SelectEvent();
            require_once 'views/admin/read/event.php';
        }
    }

    public function showAddEventForm()
    {
        if (Middleware::checkAdmin()) {
            require_once 'views/admin/create/add_event.php';
        }
    }
}
