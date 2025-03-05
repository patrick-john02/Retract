<?php
namespace App\Middlewares;
require_once __DIR__ . '/../app/core/Session.php';

use App\Core\Session;

class StudentMiddleware {
    public static function check() {
        Session::start();
        
        $role_id = Session::get('role_id');
        
        // Debugging
        // var_dump("DEBUG: Retrieved role_id from Session: " . $role_id);
        
        if ($role_id !== 2) {
            echo "Redirecting to login because role_id is not 2.";
            header("Location: /retract/public/login");
            exit();
        }
        
        // echo "Access granted!";
    }
}


?>
