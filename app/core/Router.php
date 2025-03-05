<?php
require_once __DIR__ . '/../core/View.php';

class Router {
    protected $routes = [];

    public function __construct() {
        $this->routes[''] = ['controller' => 'AuthController', 'method' => 'showLoginForm'];
        $this->routes['logout'] = ['controller' => 'AuthController', 'method' => 'logout'];
    }

    public function addRoute($uri, $controller, $method = 'index') {
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    
    public function dispatch($requestUri) {
        $uri = trim(str_replace('/retract/public', '', parse_url($requestUri, PHP_URL_PATH)), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        // echo "Debug: Requested URI - " . $uri . "<br>";

        // echo "Debug: Processed URI = " . htmlspecialchars($uri) . "<br>";
    
        if ($method === 'POST') {
            $uri .= '-post';
        }
    
        if (array_key_exists($uri, $this->routes)) {
            $controllerName = $this->routes[$uri]['controller'];
            $methodName = $this->routes[$uri]['method'];
    

            $controllerFile = str_replace('\\', '/', $controllerName) . '.php';
            $controllerPath = __DIR__ . "/../controllers/" . $controllerFile;
            

            $controllerPath = __DIR__ . "/../controllers/" . $controllerName . ".php";
    
            if (!file_exists($controllerPath)) {
                $controllerPath = __DIR__ . "/../controllers/students/" . basename($controllerFile);
            }
    
            if (file_exists($controllerPath)) {
                require_once $controllerPath;
                // echo "✅ Controller file loaded: " . $controllerPath . "<br>";
    
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    // echo "✅ Controller instantiated: " . $controllerName . "<br>";
    
                    if (method_exists($controller, $methodName)) {
                        // echo "✅ Method exists: " . $methodName . "<br>";
                        $controller->$methodName(); // Execute method
                        return;
                    } else {
                        // echo "❌ Method not found: " . $methodName;
                    }
                } else {
                    echo "❌ Controller class not found: " . $controllerName;
                }
            } else {
                // echo "❌ Controller file not found: " . $controllerPath;
            }
        } else {
            // echo "❌ No route found for URI: " . $uri;
        }
    
        $this->notFound();
    }
    
    
    protected function notFound() {
        http_response_code(404);
        View::render('errors/404');
    }
}
