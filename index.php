<?php

require_once 'models/Member.php';
require_once 'controllers/MemberController.php';
require_once 'models/Database.php';
// DB CONN
$conn = new Database();
$db = $conn->getConnection();

$memberModel = new Member($db);
$memberController = new MemberController($memberModel);

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
            }
        }

        // Other cases



        // Default route
    default:
        require_once 'views/home.php';
        break;
}
