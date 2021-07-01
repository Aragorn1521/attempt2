<?php

namespace TaskNumber2\ErrorProcessing;

use TaskNumber2\components\UrlHandling;

    /*
     * Класс нужен для того,чтобы проверить параметр LIMIT,который введен в URL.
     */
class CheckValueLimit implements ErrorsInterface
{
    /*
     * Метод проверяет значение LIMIT.Если значение не число,то выбрасывает исключение
     */
    public static function CheckValue()
    {
        $limit = UrlHandling::getLimit();
        try {
            if (!is_numeric($limit)) {
                throw new \Exception("Значение 'LIMIT' не целое чило");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    /*
     * Метод проверяет существует ли параметр LIMIT(корректно ли введены данные
     * в URL.Возвращает либо false либо текст ошибки.
     */
    public static function CheckParams()
    {
        $limit = UrlHandling::getLimit();

        if (isset($limit)) {
            self::CheckValue();
            $errors = false;
        } else {
            $errors = "Параметр LIMIT не задан";
        }
        return $errors;
    }
}
