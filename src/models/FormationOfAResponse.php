<?php

namespace TaskNumber2\models;

use TaskNumber2\models\DatabaseQuery;
use TaskNumber2\ErrorProcessing\ErrorProcessing;

    /*
     * Класс нужен для того,чтобы объединить все компоненты приложения и сформировать
     * ответ на запрос.Здесь объединяются массив ошибок,ответы на запросы в базу
     * данных.
     */
class FormationOfAResponse
{
    public static function Responce()
    {
        $errors = ErrorProcessing::Check();

        if ($errors === false) {
            $QueryingTableValues = DatabaseQuery::QueryingTableValues();
            $ColumnHeadingsQuery = DatabaseQuery::ColumnHeadingsQuery();
            $status = 1;
            $error = '';
            $data = ['head' => $ColumnHeadingsQuery,'body' => $QueryingTableValues];
            $responce = ['status' => $status,'errors' => $error,'data' => $data];
            $responce = json_encode($responce);
        } else {
            $ColumnHeadingsQuery = DatabaseQuery::ColumnHeadingsQuery();
            $status = 0;
            $data = ['head' => $ColumnHeadingsQuery];
            $responce = ['status' => $status,'errors' => $errors,'data' => $data];
            $responce = json_encode($responce);
        }

        echo  $responce;
    }
}
