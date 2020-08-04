<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = 'config/routes.php';  
        $this->routes = include($routesPath);         
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run()
    {
        $url = $this->getURI();
        
        foreach ($this->routes as $uriPattern => $path) {
            
            if (preg_match("~$uriPattern~", $url)) {
                
                // $segments = explode('/', $path);

                // $controllerName = array_shift($segments).'Controller';
                // $controllerName = ucfirst($controllerName);

                // $actionName = 'action'.ucfirst(array_shift($segments));

                // $controllerFile = 'controllers/'.$controllerName.'.php';
                // if (file_exists($controllerFile)) {
                //     include_once($controllerFile);
                // }
                // else
                // {
                //     echo "not found";
                // }

                // $controllerObj = new $controllerName;
                // $result = $controllerObj->$actionName();

                // if ($result != null) {
                //     break;
                // }
                

                echo $controllerName;
                echo "<br>";
                echo $actionName;
            }
            
        }
    }
}
