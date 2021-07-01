<?php

namespace TaskNumber2\models;

use TaskNumber2\components\UrlHandling;
use TaskNumber2\components\Db;

    /*
     * Класс занимается запросом данных из таблицы
     */
class DatabaseQuery
{
    /*
     * Метод нужен для запроса информации из базы с определенным лимитом и отступом
     */

    public static function QueryingTableValues()
    {

        $limit = UrlHandling::getLimit();
        $page = $limit * ((UrlHandling::getPage()) - 1);
        $db = Db::getConnection();

        $query = "SELECT * FROM test LIMIT $limit OFFSET $page";
        $result = $db->query($query);
        $postsList = $result->fetchAll();
        $postssList = [];


        foreach ($postsList as $post) {
            $post = array_values($post);
            $postssList[] = $post;
        }

        return $postssList;
    }

    /*
     * Метод нужен для запроса информации из базы ,а именно запрашивает значение
     * колонок в таблице
     */

    public static function ColumnHeadingsQuery()
    {
        $db = Db::getConnection();

        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS "
                . "WHERE  TABLE_NAME = 'test' ORDER BY ordinal_position ASC ";
        $result = $db->query($query);

        $s = $result->fetchAll(\PDO::FETCH_ASSOC);

        $new_array = [];
        foreach ($s as $array) {
            foreach ($array as $val) {
                array_push($new_array, $val);
            }
        }

        return($new_array);
    }

    /*
     * Метод нужен для того,чтобы узнать количество записей в таблице
     */
    public static function QueryForTheNumberOfRecordsInATable()
    {
        $db = Db::getConnection();
        $query = "SELECT COUNT(*) FROM test";
        $result = $db->query($query);
        $result = $result->fetch();
        return $result[0];
    }
}
