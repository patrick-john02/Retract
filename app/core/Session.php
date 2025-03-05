<?php
namespace App\Core;

class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        self::start();
        return $_SESSION[$key] ?? null;
    }


    public static function hasFlash($key) {
        return isset($_SESSION['flash'][$key]);
    }

    public static function getFlash($key) {
        if (!isset($_SESSION['flash'][$key])) {
            return null;
        }
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message;
    }

    public static function setFlash($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    public static function regenerate() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public static function destroy() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            session_unset(); 
            session_destroy();

            // Remove cookie
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params['path'], $params['domain'],
                    $params['secure'], $params['httponly']
                );
            }
        }
    }
    public static function isAdmin() {
        return self::get('user_role') === 'admin';
    }
    public static function isfaculty(){
        return self::get('user_role') === 'faculty';
    }
    public static function isstudent(){
        return self::get('user_role') === 'student';
    }
}

Session::start();