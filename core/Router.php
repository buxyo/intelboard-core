<?php
$lang = $_SESSION['locale'] ?? 'en';
Lang::load($lang);

require_once __DIR__ . '/Middleware.php';

$request = rtrim($_SERVER['REQUEST_URI'], '/');

// Dynamic /drivers/{id} route
if (preg_match('#^/drivers/([0-9]+)$#', $request, $matches)) {
    $driverId = $matches[1];
    Middleware::auth();
    require __DIR__ . '/../views/layout/header.php';
    echo \"Viewing driver with ID: \" . htmlspecialchars($driverId);
    require __DIR__ . '/../views/layout/footer.php';
    exit;
}

switch ($request) {
    case '':
    case '/':
    case '/dashboard':
        Middleware::auth();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/dashboard/index.php';
        require __DIR__ . '/../views/layout/footer.php';
        break;

    case '/login':
        require __DIR__ . '/../views/auth/login.php';
        break;

    case '/logout':
        session_destroy();
        header('Location: /login');
        exit;

    case '/drivers':
        Middleware::auth();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/drivers/index.php';
        require __DIR__ . '/../views/layout/footer.php';
        break;

    case '/add-driver':
        Middleware::auth();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/drivers/add.php';
        require __DIR__ . '/../views/layout/footer.php';
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
        break;
}
