<?php
namespace App\Core;

class Auth {
    public static function requireLogin() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }
}
