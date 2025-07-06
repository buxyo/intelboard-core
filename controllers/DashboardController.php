<?php
class DashboardController {
    public static function index() {
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/dashboard/index.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public static function drivers() {
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/drivers/index.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public static function addDriver() {
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/drivers/add.php';
        require __DIR__ . '/../views/layout/footer.php';
    }
}