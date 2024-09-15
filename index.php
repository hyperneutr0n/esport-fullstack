<?php

//MODELS
require_once 'models/Member.php';
require_once 'models/Game.php';
require_once 'models/Event.php';


//CONTROLLERS
require_once 'controllers/MemberController.php';
require_once 'controllers/GameController.php';
require_once 'controllers/EventController.php';
require_once 'controllers/AchievementController.php';
require_once 'controllers/EventTeamsController.php';
require_once 'controllers/JoinProposalController.php';
require_once 'controllers/TeamController.php';
require_once 'controllers/TeamMembersController.php';



//CONTROLLERS INITIALIZATION
$memberController = new MemberController();
$gameController = new GameController();
$eventController = new EventController();
$achievementController = new AchievementController();
$eventTeamsController = new EventTeamsController();
$joinProposalController = new JoinProposalController();
$teamController = new TeamController();
$teamMembersController = new TeamMembersController();

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
                    $memberController->showLoginForm();
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
                    //READ DATA
                case 'member':
                    $memberController->showMemberForm();
                    break;
                case 'game':
                    $gameController->showGameForm();
                    break;
                case 'team':
                    $teamController->showTeamForm();
                    break;
                case 'event':
                    $eventController->showEventForm();
                    break;
                case 'achievement':
                    $achievementController->showAchievementForm();
                    break;
                case 'joinproposal':
                    $joinProposalController->showJoinProposalForm();
                    break;
                case 'teammembers':
                    $teamMembersController->showTeamMembersForm();
                    break;
                case 'eventteams':
                    $eventTeamsController->showEventTeamForm();
                    break;
                    //ADD DATA FORM
                case 'addgame':
                    $gameController->showAddGameForm();
                    break;
                case 'addevent':
                    $eventController->showAddEventForm();
                    break;
                case 'addteam':
                    $teamController->showAddTeamForm();
                    break;
                case 'addachievement':
                    $achievementController->showAddAchievementForm();
                    break;
                case 'addeventteams':
                    $eventTeamsController->showAddEventTeamForm();
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
                case 'login':
                    $memberController->Login();
                    break;
                case 'register':
                    $memberController->Register();
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
