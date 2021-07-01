<?php

namespace TaskNumber2\components;

/*
 * Класс нужен для того,чтобы сформировать параметры запроса в URL(LIMIT,PAGE,TABLE)
 */
class UrlHandling
{
    public static function getLimit()
    {
        $limit = $_GET['limit'];
        return $limit;
    }

    public static function getPage()
    {
        $page = $_GET['page'];
        return $page;
    }

    public static function CheckOneParameter()
    {
        $table = $_GET['q'];
        return $table;
    }
}
