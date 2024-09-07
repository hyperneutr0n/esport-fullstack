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


        // MEMBER ROUTES
    case 'member':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'login':
                    break;
                case 'register':
                    $memberController->showRegisterForm();
                    break;
                case 'add':
                    $memberController->Register();
                    break;
                case 'joinproposal':
                    break;
                default:
                    require_once 'views/home.php';
                    break;
            }
        } else {
            require_once 'views/home.php';
        }
        break;

        //ADMIN ROUTES
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
                    break;
                case 'addachievement':
                    break;
                case 'addeventteams':
                    break;
                default:
                    require_once 'views/home.php';
                    break;
            }
        } else {
            require_once 'views/home.php';
        }
        break;

        //PROCESS ROUTES
    case 'process':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'addgame':
                    $gameController->addGame();
                    break;
                case 'addevent':
                    break;
                case 'addteam':
                    break;
                case 'addachievement':
                    break;
                case 'addeventteams':
                    break;

                default:
                    require_once 'views/home.php';
                    break;
            }
        }





        // Default route
    default:
        require_once 'views/home.php';
        break;
}
