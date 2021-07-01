<?php

namespace TaskNumber2\ErrorProcessing;

use TaskNumber2\components\UrlHandling;

    /*
     * Класс нужен для того,чтобы проверить параметр PAGE,который введен в URL.
     */
class CheckValuePage implements ErrorsInterface
{
    /*
     * Метод проверяет значение PAGE.Если значение не число,то выбрасывает исключение
     */
    public static function CheckValue()
    {
        $page = UrlHandling::getPage();
        try {
            if (!is_numeric($page)) {
                throw new \Exception("Значение 'PAGE' не целое чило");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    /*
     * Метод проверяет существует ли параметр PAGE(корректно ли введены данные
     * в URL.Возвращает либо false либо текст ошибки.
     */
    public static function CheckParams()
    {
        $page = UrlHandling::getPage();

        if (isset($page)) {
            self::CheckValue();
            $errors = false;
        } else {
            $errors = "Параметр PAGE не задан";
        }
        return $errors;
    }
}
