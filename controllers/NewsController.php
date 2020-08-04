<?php

class NewsController
{
    public function actionIndex():bool
    {
        echo "Список Новостей";
        return true;
    }

    public function actionView():bool
    {
        echo "Просмотр одной новости";
        return true;
    }
}
