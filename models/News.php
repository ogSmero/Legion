<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author smero
 */

class News {
    
    public static function getNewsItemById($id) 
    {
        $id = intval($id);
        
        if($id)
        {
            $db = Db::getConnect();

            $result = $db->query('SELECT * FROM news WHERE ID =' . $id);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }
    
    
    public static function getNewsList()
    {
     
        $db = Db::getConnect();
        
        $newsList = array();
        
        $result = $db->query('SELECT ID, title, date FROM news ORDER BY date DESC LIMIT 10');
        $i = 0;
        
        while ($row = $result->fetch())
        {
            $newsList[$i]['ID'] = $row['ID'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $i++;
        }
        return $newsList;
        
    }
    
}
