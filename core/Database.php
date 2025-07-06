<?php

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        require_once __DIR__ . '/../config/config.php';
        $this->pdo = $pdo;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
