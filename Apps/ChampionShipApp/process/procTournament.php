<?php
session_start();
require($urlMain . 'config.php');

if ($_SESSION['challenger'] != null){

    foreach ($_SESSION['challenger'] as $key => $value) {
        $name = 'challenger' . $key;
        $$name = $value;  
    }




}else{
    $linkDB = new linkDB($ip, $login, $password, $nameDB);

    $arrayDB = mysqli_query($linkDB->getConnect(), "select * from $tableName ");//tableName => config
    $arrayDB = mysqli_fetch_all($arrayDB,1);
    
    //SORT
    //сортируем масив по количеству вызовов на турнир
    $arrIDBlock = array_column($arrayDB, $countChoises); //$countChoises => config
    array_multisort($arrIDBlock, SORT_ASC, $arrayDB);
    
    //SLICE
    $sliceArray = array_slice($arrayDB, 0 , $countSlice);
    
    //ADD
    // cуём номера претендентов в один массив
    $arrayTournament = array_column($sliceArray, $idColumn); //idColimn => config
    
    
    
    function arrayPairs(){
        global $countSlice;
        $arrNum = [];

        for ($i=0; $i < $countSlice; $i++) {
            array_push($arrNum, $i);
        }

        $arr = [];
        for ($i=0; $i < $countSlice; $i++) { 
            foreach($arrNum as $key => $massive){
                $a = $i;
                $b = $massive;        
                if ($a != $b){       
                    $c = [$a, $b];     
                array_push($arr, $c);
                }
            };
            unset($arrNum[$i]);
        }
            shuffle($arr);

        return $arr;
    }
    
    $arrayPairs = arrayPairs();
    
    
    $_SESSION['challenger'] = [];
    foreach ($sliceArray as $key => $arr) {
        $name = 'challenger' . $key;
        $$name = new challenger($arr[$idColumn], $arr[$scoreColumnName], $arr[$countChoises], $arr[$nameColumn]); // idColumn scoreColumnName countChoises nameColumn => config
        array_push($_SESSION['challenger'], $$name);    
    };
    
    $_SESSION['challengerPair'] = $arrayPairs;

};



?>
