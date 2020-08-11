<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Db
 *
 * @author smero
 */

class Db {
    
    public static function getConnect()
    {
        $paramsPath = 'config/db_params.php';
        $params = include $paramsPath;
        
        $dns = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dns, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        return $db;
    }
    
}
