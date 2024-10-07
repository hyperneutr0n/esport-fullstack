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
                header('Location: /admin/event?message=Please%20input%20the%20correct%20date%20format');
            }

            // Format the date to the required format
            $stringdate = $dateObject->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            if ($this->model->AddEvent($name, $stringdate, $description)) {
                header('Location: /admin/event?message=Succesfully%20added%20event');
            } else {
                header('Location: /admin/event?message=Failed%20adding%20event');
            }
        } else {
            header("Location: /");
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
                header('Location: /admin/event?message=Please%20input%20the%20correct%20date%20format');
            }

            // Format the date to the required format
            $stringdate = $dateObject->format('Y-m-d H:i:s');
            $description = $_POST['description'];

            if ($this->model->EditEvent($id, $name, $stringdate, $description)) {
                header('Location: /admin/event?message=Succesfully%20updated%20event');
            } else {
                header('Location: /admin/event?message=Failed%20updating%20event');
            }
        } else {
            header("Location: /");
        }
    }

    public function DeleteEvent()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            if ($this->model->DeleteEvent($id)) {
                header('Location: /admin/event?message=Succesfully%20deleted%20event');
            } else {
                header('Location: /admin/event?message=Failed%20deleted%20event');
            }
        } else {
            header("Location: /");
        }
    }

    public function showEventForm()
    {
        if (Middleware::checkAdmin()) {
            $events = $this->model->SelectEvent();
            require_once 'views/admin/read/event.php';
        } else {
            header("Location: /");
        }
    }
    public function showMemberEventForm()
    {
        if (Middleware::checkMember()) {
            $events = $this->model->SelectEvent();
            require_once 'views/member/event.php';
        } else {
            header("Location: /");
        }
    }

    public function showAddEventForm()
    {
        if (Middleware::checkAdmin()) {
            require_once 'views/admin/create/add_event.php';
        } else {
            header("Location: /");
        }
    }

    public function showEditEventForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $event = $this->model->SelectEventId($id);
            require_once 'views/admin/update/edit_event.php';
        } else {
            header("Location: /");
        }
    }
}
