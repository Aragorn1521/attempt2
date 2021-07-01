<?php

namespace TaskNumber2\ErrorProcessing;

use TaskNumber2\ErrorProcessing\CheckValueLimit;
use TaskNumber2\ErrorProcessing\CheckValuePage;
use TaskNumber2\ErrorProcessing\CheckingTheNumberOfRecords;
use TaskNumber2\ErrorProcessing\CheckOneParameter;

/*
 * Суть данного класса - запись всех существующих ошибок в 1 массив.
 * Если ошибки существуют - они будут переданы дальше в класс FormationOfAResponse
 */
class ErrorProcessing
{
    public static function Check()
    {
        $limit = CheckValueLimit::CheckParams();
        $page = CheckValuePage::CheckParams();
        $CountTheNumberOfEntries = CheckingTheNumberOfRecords::CheckParams();
        $CheckOneParameter = CheckOneParameter::CheckParams();

        if (
            ($limit !== false) ||
                ($page !== false) ||
                ($CountTheNumberOfEntries !== false) ||
                ($CheckOneParameter !== false)
        ) {
            $errors = [$limit,$page,$CountTheNumberOfEntries,$CheckOneParameter];
        } else {
            $errors = false;
        }
        return $errors;
    }
}
