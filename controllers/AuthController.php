<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Database.php';

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $this->redirect('dashboard');
            } else {
                $error = "Invalid email or password.";
                $this->view('auth/login', ['error' => $error]);
                return;
            }
        }
        $this->view('auth/login');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('login');
    }
}
