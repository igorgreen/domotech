<?php
 
 
// Режим работы API (Development || Production) Задает константа DEBUG_MODE, при работе по локальным ip ошибки показаны и скрыты на удаленном сервере. Режим работы с проверкой по ip предложен как вариант автоматизации и может быть реализована в простом использованию error_reporting (E_ALL) для отладки и error_reporting (0) для рабочей версии
define('DEBUG_MODE', (bool)(strpos($_SERVER["REMOTE_ADDR"], "127.0.0.") === 0 || strpos($_SERVER["REMOTE_ADDR"], "192.168.0.") === 0)); 
ini_set('display_errors', DEBUG_MODE);

//константа типа данных на выходе
define('DATATYPE','json'); 
//define('DATATYPE','xml'); 


define('HOSTNAME','localhost');
define('USERNAME','*******');
define('PASSWORD','*******');
define('DBNAME','*******');
define('CHARSET','utf8'); 


setlocale(LC_ALL, 'ru_RU.'.CHARSET); 
 
  