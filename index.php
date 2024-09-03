<?php

require_once 'models/MemberModel.php';
require_once 'controllers/MemberController.php';

// Database connection setup (replace with your own connection details)
$db = new mysqli('localhost', 'root', '', 'esport_fullstack');

$memberModel = new Member($db);
$memberController = new MemberController($memberModel);

// Get the request URI, trim it, and split it into parts
$requestUri = trim($_SERVER['REQUEST_URI'], '/');
$uriSegments = explode('/', $requestUri);

// Basic routing using switch case
switch ($uriSegments[0]) {
    case 'member':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'add':
                    $memberController->addAccount();
                    break;
                    // Add more cases here for other member-related actions
                default:
                    require_once 'views/member_home.php';
                    break;
            }
        } else {
            require_once 'views/member_home.php';
        }
        break;

        // Add more cases here for other base routes like 'account', 'team', etc.

    default:
        require_once 'views/home.php';
        break;
}
