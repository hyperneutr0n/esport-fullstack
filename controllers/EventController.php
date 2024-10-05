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
                echo "<script>alert('Invalid date format');</script>";
                die("Invalid date format");
            }

            // Format the date to the required format
            $stringdate = $dateObject->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            if ($this->model->AddEvent($name, $stringdate, $description)) {
                echo "<script>alert('Event Added Successfully');</script>";
            } else {
                echo "<script>alert('Failed to add event');</script>";
            }
        }
    }

    public function EditEvent()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['idevent'];
            $name = $_POST['name'];
            $date = $_POST['date'];

            $dateObject = DateTime::createFromFormat('Y-m-d', $date);
            if (!$dateObject) {
                // Handle invalid date format
                echo "<script>alert('Invalid date format');</script>";
                die("Invalid date format");
            }

            // Format the date to the required format
            $stringdate = $dateObject->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            if ($this->model->EditEvent($id, $name, $stringdate, $description)) {
                echo "<script>alert('Event Edited Successfully');</script>";
            } else {
                echo "<script>alert('Failed to edit event');</script>";
            }
        }
    }

    public function DeleteEvent()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            if ($this->model->DeleteEvent($id)) {
                echo "<script>alert('Event Deleted Successfully');</script>";
            } else {
                echo "<script>alert('Failed to delete event');</script>";
            }
        }
    }

    public function showEventForm()
    {
        if (Middleware::checkAdmin()) {
            $events = $this->model->SelectEvent();
            require_once 'views/admin/read/event.php';
        }
    }
    public function showMemberEventForm()
    {
        if (Middleware::checkMember()) {
            $events = $this->model->SelectEvent();
            require_once 'views/member/event.php';
        }
    }

    public function showAddEventForm()
    {
        if (Middleware::checkAdmin()) {
            require_once 'views/admin/create/add_event.php';
        }
    }

    public function showEditEventForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $event = $this->model->SelectEventId($id);
            require_once 'views/admin/update/edit_event.php';
        }
        // harusnya require once
    }
}
