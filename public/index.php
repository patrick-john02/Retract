<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Auth.php';


session_start();

$router = new Router();
require_once __DIR__ . '/../routes/web.php';



$router->dispatch($_GET['url'] ?? '/');

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
