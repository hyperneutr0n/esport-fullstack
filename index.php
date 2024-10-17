<?php

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
$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
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
                    $joinProposalController->showAddJoinProposalForm();
                    break;
                case 'event':
                    $eventController->showMemberEventForm();
                    break;
                case 'achievement':
                    $achievementController->showMemberAchievementForm();
                    break;
                default:
                    $memberController->showHome();
                    break;
            }
        } else {
            $memberController->showHome();
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

                    //SHOW DETAIL FORM
                case 'details':
                    if ($uriSegments[2] === 'team') $teamController->showTeamDetailsForm();
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
                case 'addteammembers':
                    $teamMembersController->showAddTeamMemberForm();
                    break;
                case 'addachievement':
                    $achievementController->showAddAchievementForm();
                    break;
                case 'addeventteams':
                    $eventTeamsController->showAddEventTeamForm();
                    break;
                case 'addjoinproposal':
                    $joinProposalController->showAddJoinProposalForm();
                    break;
                    //EDIT DATA FORM
                case 'updatemember':
                    $memberController->showEditMemberForm();
                    break;
                case 'updategame':
                    $gameController->showEditGameForm();
                    break;
                case 'updateevent':
                    $eventController->showEditEventForm();
                    break;
                case 'updateteam':
                    $teamController->showEditTeamForm();
                    break;
                case 'updateteammembers':
                    $teamMembersController->showEditTeamMembersForm();
                    break;
                case 'updateachievement':
                    $achievementController->showEditAchievementForm();
                    break;
                case 'updateeventteams':
                    $eventTeamsController->showEditEventTeamForm();
                    break;
                case 'updatejoinproposal':
                    $joinProposalController->showEditJoinProposalForm();
                    break;
                default:
                    $memberController->showHome();
                    break;
            }
        } else {
            $memberController->showHome();
        }
        break;

        //PROCESS ROUTES
    case 'process':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'login':
                    $memberController->Login();
                    break;
                case 'logout':
                    $memberController->Logout();
                    break;
                case 'register':
                    $memberController->Register();
                    break;

                case 'addgame':
                    $gameController->addGame();
                    break;
                case 'addevent':
                    $eventController->AddEvent();
                    break;
                case 'addteam':
                    $teamController->addTeam();
                    break;
                case 'addachievement':
                    $achievementController->addAchievement();
                    break;
                case 'addeventteams':
                    $eventTeamsController->addEventTeam();
                    break;
                case 'addteammembers':
                    $teamMembersController->AddTeamMembers();
                    break;
                case 'addjoinproposal':
                    $joinProposalController->addJoinProposal();
                    break;



                    //EDIT
                case 'updatemember':
                    $memberController->Edit();
                    break;
                case 'updategame':
                    $gameController->EditGame();
                    break;
                case 'updateevent':
                    $eventController->EditEvent();
                    break;
                case 'updateteam':
                    $teamController->editTeam();
                    break;
                case 'updateachievement':
                    $achievementController->editAchievement();
                    break;
                case 'updateeventteams':
                    $eventTeamsController->editEventTeam();
                    break;
                case 'updateteammembers':
                    $teamMembersController->editTeamMembers();
                    break;
                case 'updatejoinproposal':
                    $joinProposalController->editJoinProposal();
                    break;

                    //DELETE
                case 'deletemember':
                    $memberController->Delete();
                    break;
                case 'deletegame':
                    $gameController->DeleteGame();
                    break;
                case 'deleteevent':
                    $eventController->DeleteEvent();
                    break;
                case 'deleteteam':
                    $teamController->deleteTeam();
                    break;
                case 'deleteachievement':
                    $achievementController->deleteAchievement();
                    break;
                case 'deleteeventteams':
                    $eventTeamsController->deleteEventTeam();
                    break;
                case 'deleteteammembers':
                    $teamMembersController->deleteTeamMembers();
                    break;
                case 'deletejoinproposal':
                    $joinProposalController->deleteJoinProposal();
                    break;

                case 'processjoinproposal':
                    $joinProposalController->processJoinProposal();
                    break;


                default:
                    $memberController->showHome();
                    break;
            }
        }

        // Default route
    default:
        $memberController->showHome();
        break;
}
