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

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Flash::set('error', 'Please enter a valid email address.');
                header('Location: /login');
                exit;
            }

            // Optional basic rate limiting placeholder
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = 0;
            }
            $_SESSION['login_attempts']++;

            if ($_SESSION['login_attempts'] > 10) {
                die('Too many login attempts. Please try again later.');
            }

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['login_attempts'] = 0;
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
