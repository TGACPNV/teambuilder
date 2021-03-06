<?php
namespace TeamBuilder;
use TeamBuilder\Controller\HomeController;
use TeamBuilder\Controller\MemberController;


session_start();
date_default_timezone_set('Europe/Zurich');
require_once 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$homeController = new HomeController();
$memberController = new MemberController();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'home':
            $homeController->showHome();
            break;
        case 'memberList':
            $memberController->showMemberList();
            break;
        case 'myProfile':
            $memberController->showOwnProfile();
            break;
        case 'userProfile':
            $memberController->showUserProfile();
            break;
        default:
            $homeController->showHome();
    }
}else{
    $homeController->showHome();
}


