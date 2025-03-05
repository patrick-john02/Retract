<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
    
        if (file_exists($viewPath)) {
            // echo "✅ View found: " . $viewPath . "<br>";
            require_once $viewPath;
        } else {
            die("❌ View not found: " . $viewPath);
        }
    }
    

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
