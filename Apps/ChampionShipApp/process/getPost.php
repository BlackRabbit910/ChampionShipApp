<?php
require_once('../config.php');
require_once('../class/challenger.php');
require_once('../class/linkDB.php');
session_start();

foreach ($_SESSION['challenger'] as $key => $value) {
    $name = 'challenger' . $key;
    $$name = $value;  
}

// на какие данные рассчитан этот скрипт
header("Content-Type: application/json");

// способ получения данных от javascr не меняется
$data = json_decode(file_get_contents("php://input"));
// $data = ['3', '2', '3', '4', '5', '3'];


$count = count($_SESSION['challenger']);


foreach ($data as $key => $value) {


    for ($i=0; $i < $count; $i++) { 

        $ID = ${'challenger' . $i}->getIdBlock();
    
        if($ID == $value) {
            $oldScore = ${'challenger' . $i}->getScore();
            ${'challenger' . $i}->setScore($oldScore+1);
            
        }
    
    }
}

$linkDB = new linkDB($ip, $login, $password, $nameDB);

for ($i=0; $i < $count; $i++) { 
    
    $oldNumChoises = ${'challenger' . $i}->getNumChoises();
    $oldNumChoises = $oldNumChoises + ($countSlice - 1);
    ${'challenger' . $i}->setNumChoises($oldNumChoises);
}


for ($i=0; $i < $count; $i++) { 

    $scoreChallenger = ${'challenger' . $i}->getScore();

    $idChallenger = ${'challenger' . $i}->getIdBlock();
    $numChoisesChallenger = ${'challenger' . $i}->getNumChoises();
    $nameChall = ${'challenger' . $i}->getName();
     
    $setData = mysqli_query($linkDB->getConnect(), "UPDATE $tableName SET $scoreColumnName = $scoreChallenger WHERE $tableName.$idColumn = $idChallenger; "); // scoreColumnName idColumn => config
    $setData2 = mysqli_query($linkDB->getConnect(), "UPDATE $tableName SET $countChoises = $numChoisesChallenger WHERE $tableName.$idColumn = $idChallenger;"); // countChoises idColumn => config
}






session_destroy();

//Ответ на полной загрузке запроса на БД
echo 'Ваши данные успешно сохранены,<a href="../index.php">-> НА ГЛАВНУЮ СТРАНИЦУ <-</a>' ;



?>


