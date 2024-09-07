<?php

//MODELS
require_once 'models/Member.php';
require_once 'models/Game.php';
require_once 'models/Event.php';


//CONTROLLERS
require_once 'controllers/MemberController.php';
require_once 'controllers/GameController.php';
require_once 'controllers/EventController.php';


//DATABASE
require_once 'models/Database.php';
// DB CONN
$conn = new Database();
$db = $conn->getConnection();


//MEMBER
$memberModel = new Member($db);
$memberController = new MemberController($memberModel);

//GAME
$gameModel = new Game($db);
$gameController = new GameController($gameModel);

//EVENT
$eventModel = new Event($db);
$eventController = new EventController($eventModel);

// Request handling
$requestUri = trim($_SERVER['REQUEST_URI'], '/');
$uriSegments = explode('/', $requestUri);

// Simple routing using switch case
switch ($uriSegments[0]) {
        // ROLE = MEMBER
    case 'member':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'add':
                    $memberController->Register();
                    break;
                case 'register':
                    $memberController->showRegisterForm();
                    break;
                default:
                    require_once 'views/home.php';
                    break;
            }
        } else {
            require_once 'views/home.php';
        }
        break;
    case 'admin':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'home':
                    $memberController->showAdminHome();
                    break;
                case 'addgame':
                    $gameController->showAddGameForm();
                    break;
                case 'addevent':
                    $eventController->showAddEventForm();
                    break;
                case 'addteam':
                    require_once 'views/admin/add_team.php';
                    break;
                default:
                    require_once 'views/home.php';
                    break;
            }
        } else {
            require_once 'views/home.php';
        }
        break;
    case 'process':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'addgame':
                    $gameController->addGame();
                    break;

                default:
                    require_once 'views/home.php';
                    break;
            }
        }

        // Other cases



        // Default route
    default:
        require_once 'views/home.php';
        break;
}
