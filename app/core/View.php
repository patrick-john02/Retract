<?php

class View {
    public static function render($view, $data = []) {
        $viewPath = __DIR__ . "/../views/{$view}.php";

        if (file_exists($viewPath)) {
            extract($data);
            require_once $viewPath;
        } else {
            die("View file '{$view}' not found.");
        }
    }
}
