<?php

header('Content-type: json/application');
require_once __DIR__ . '/vendor/autoload.php';

/*
 * Задание 2 - создание API.
 * пример запроса(http://api/table&page=1111&limit=1)
 */

use TaskNumber2\models\FormationOfAResponse;
$response = FormationOfAResponse::Responce();






