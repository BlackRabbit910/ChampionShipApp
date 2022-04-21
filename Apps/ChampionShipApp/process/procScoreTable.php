<?php

$linkDB = new linkDB($ip, $login, $password, $nameDB);


$arrayDB = mysqli_query($linkDB->getConnect(), "select * from $tableName ");
$arrayDB = mysqli_fetch_all($arrayDB,1);


$score = array_column($arrayDB, 'score');
$numChoises = array_column($arrayDB, 'numChoises');

array_multisort($score, SORT_DESC, $numChoises, SORT_ASC, $arrayDB);

