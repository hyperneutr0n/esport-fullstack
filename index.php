<?php

require_once 'models/MemberModel.php';
require_once 'controllers/MemberController.php';

// Database connection setup (replace with your own connection details)
$db = new mysqli('localhost', 'root', '', 'esport_fullstack');

$memberModel = new memberModel($db);
$memberController = new memberController($accountModel);

// Basic routing
if ($_SERVER['REQUEST_URI'] == '/account/add') {
    $memberController->addAccount();
} else {
    require_once 'views/home.php';
}
