<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Flash.php';
require_once __DIR__ . '/../core/Middleware.php';

class AuthController {
    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Middleware::csrf();
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                header('Location: /dashboard');
                exit;
            } else {
                Flash::set('error', 'Invalid email or password.');
                header('Location: /login');
                exit;
            }
        }
        require __DIR__ . '/../views/auth/login.php';
    }

    public static function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }
}