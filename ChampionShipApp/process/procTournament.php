<?php
session_start();

require('./config.php');

if ($_SESSION['challenger'] != null){
    foreach ($_SESSION['challenger'] as $key => $value) {
        $name = 'challenger' . $key;
        $$name = $value;  
    }
}else{
    $linkDB = new linkDB($ip, $login, $password, $nameDB);

    $arrayDB = mysqli_query($linkDB->getConnect(), "select * from $tableName ");
    $arrayDB = mysqli_fetch_all($arrayDB,1);
    
    //SORT
    //сортируем масив по количеству вызовов на турнир
    $arrIDBlock = array_column($arrayDB, 'numChoises');
    array_multisort($arrIDBlock, SORT_ASC, $arrayDB);
    
    //SLICE
    $sliceArray = array_slice($arrayDB, 0 , $countSlice);
    
    //ADD
    // cуём номера претендентов в один массив
    $arrayTournament = array_column($sliceArray, 'idBlock');
    
    
    
    
    // создаём готовые пары претендентов и делаем масив
    function arrayPairs(){    
        global $arrayTournament;
    
        $enterArr = $arrayTournament;
    
        $count = count($enterArr);
    
        $arr=[];
    
        for ($i=0; $i < $count; $i++) { 
            foreach($enterArr as $key => $massive){
                $a = $enterArr[$i];
                $b = $massive;        
                if ($a != $b){       
                    $c = [$a, $b];     
                array_push($arr, $c);
                }
            };
            unset($enterArr[$i]);
        }
    
        shuffle($arr);
    
        return $arr;
    }
    $arrayPairs = arrayPairs();
    
    
    $_SESSION['challenger'] = [];
    foreach ($sliceArray as $key => $arr) {
        $name = 'challenger' . $key;
        $$name = new challenger($arr['idBlock'], $arr['score'], $arr['numChoises'], $arr['name']);
        array_push($_SESSION['challenger'], $$name);    
    };

};



?>
