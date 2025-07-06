<?php
class RoutesController {
    public static function index() {
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/routes/index.php';
        require __DIR__ . '/../views/layout/footer.php';
    }
}