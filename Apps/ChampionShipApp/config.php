<?php
// DataBase 
$ip = 'localhost' ;
$login = 'root' ;
$password = '' ;
$nameDB = 'main_content' ;

// путь от корня сайта до потключаемых модулей 
$urlMain = 'apps/championShipApp/';

// адрес до картинок "../img/challenger/"
$imgUrl = '/apps/championShipApp/img/challenger/';

//имя таблицы с данными
$tableName = 'score' ;

//Count slice array for Challenge
$countSlice = 8;




require_once($urlMain . 'class/classList.php');