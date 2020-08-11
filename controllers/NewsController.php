<?php

/**
 * Description of AccountController
 *
 * @author smero
 */

include_once 'models/News.php';

class NewsController
{
    public function actionIndex():bool
    {
        $newsList = array();
        $newsList = News::getNewsList();
        
        require_once 'views/news/index.php';
        return true;
    }

    public function actionView($id):bool
    {
        if($id)
        {
            $newsItem = News::getNewsItemById($id);
            echo "<pre>";
            print_r($newsItem);
            echo "</pre>";
            echo "actionView";
        }        
        return true;
    }
}
