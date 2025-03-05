<?php
namespace App\Middlewares;
require_once __DIR__ . '/../app/core/Session.php';

use App\Core\Session;

class FacultyMiddleware {
    public static function check() {
        if (Session::get('role_id') !== 3) {
            header("Location: /retract/public/login");
            exit();
        }
    }
}
