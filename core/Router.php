<?php
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/DashboardController.php';

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

    default:
        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
        break;
}
```

---

### 3️⃣ `core/Flash.php`
```php
<?php
class Flash {
    public static function set($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    public static function get($key) {
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        return null;
    }
}