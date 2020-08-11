<?php 
   

    ini_set('display_errors', 1);

    error_reporting(E_ALL);

    
    require_once 'components/Router.php';
    require_once 'components/Db.php';

    $router = new Router();
    $router->run();
    
    