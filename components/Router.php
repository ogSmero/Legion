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
        if (!empty($_SERVER['REQUEST_URI'])) 
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run()
    {
        $url = $this->getURI();
        
        foreach ($this->routes as $uriPattern => $path) {
            
            if (preg_match("~$uriPattern~", $url)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $url);
                
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';

                $controllerName = ucfirst($controllerName);
                
                $actionName = 'action'.ucfirst(array_shift($segments));
                                
                echo '<br> controller name: '.$controllerName;
                echo '<br> action name: '.$actionName;
                
                $parameters = $segments;
             
                $controllerFile = 'controllers/'.$controllerName.'.php';
                
                if(file_exists($controllerFile))
                {
                    include_once $controllerFile;
                }
                
                $controllerObj = new $controllerName;
                $result = call_user_func_array(array($controllerObj, $actionName), $parameters);

                if ($result != null) {
                     break;
                }

            }
            
        }
    }
}


