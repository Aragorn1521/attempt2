<?php

namespace TaskNumber2\ErrorProcessing;

use TaskNumber2\components\UrlHandling;

    /*
     * Класс нужен для того,чтобы проверить параметр TABLE,который введен в URL.
     */
class CheckOneParameter implements ErrorsInterface
{
    public static function CheckParams()
    {
        $CheckOneParameter = UrlHandling::CheckOneParameter();
        if ($CheckOneParameter != 'table') {
            $errors = "Первый параметр запроса не равен 'table'";
        } else {
            $errors = false;
        }
        return $errors;
    }
}
