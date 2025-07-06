<?php
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/DashboardController.php';
require_once __DIR__ . '/../controllers/RoutesController.php';

$request = rtrim($_SERVER['REQUEST_URI'], '/');

switch ($request) {
    case '':
    case '/':
    case '/dashboard':
        Middleware::auth();
        DashboardController::index();
        break;

    case '/login':
        AuthController::login();
        break;

    case '/logout':
        AuthController::logout();
        break;

    case '/drivers':
        Middleware::auth();
        DashboardController::drivers();
        break;

    case '/add-driver':
        Middleware::auth();
        DashboardController::addDriver();
        break;

    case '/routes':
        Middleware::auth();
        RoutesController::index();
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
        break;
}