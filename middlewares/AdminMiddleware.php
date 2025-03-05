<?php
namespace App\Middlewares;
require_once __DIR__ . '/../app/core/Session.php';

use App\Core\Session;

class AdminMiddleware {
    public static function check() {
        if (Session::get('role_id') !== 1) {
            header("Location: /retract/public/login");
            exit();
        }
    }
}
