<?php

namespace TaskNumber2\ErrorProcessing;

use TaskNumber2\models\DatabaseQuery;
use TaskNumber2\components\UrlHandling;

    /*
     * Класс нужен для того,чтобы сравнить значения LIMIT и PAGE введенные в URL
     * с количеством записей в таблице.Если введенное значение
     * превысит количество записей в таблице -  появится ошибка.
     */
class CheckingTheNumberOfRecords implements ErrorsInterface
{
    public static function CheckParams()
    {

        $limit = UrlHandling::getLimit();
        $page = UrlHandling::getPage();
        $result = DatabaseQuery::QueryForTheNumberOfRecordsInATable();


        if (($page * $limit) < ($result + $limit )) {
            $errors = false;
        } else {
            $errors = 'Вы ввели значение lim и page,которые превышают '
                    . 'количетво записей в таблице';
        }
        return $errors;
    }
}
