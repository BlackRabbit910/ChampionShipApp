<?php
require('./config.php');

$linkDB = new linkDB($ip, $login, $password, $nameDB);

$arrayDB = mysqli_query($linkDB->getConnect(), 'select `numChoises`, `idBlock` from `score`');
$arrayDB = mysqli_fetch_all($arrayDB,1);

asort($arrayDB);
$sliceArray = array_slice($arrayDB, 0 , $countSlice);

// cуём номера претендентов в один массив
function arrayChallenger(){
    global $sliceArray;
    $arr = [];
    foreach ($sliceArray as $key => $value) {

        $a = $value['idBlock'];
        array_push($arr, $a);
    };
    return $arr;

}
$arrayTournament = arrayChallenger();


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

//создаём через цикл отдельных претендентов
$challenger0 = 'fail';
$challenger1 = 'fail2';
$challenger2 = 'fail3';
// print_r($arrayTournament);
foreach ($arrayTournament as $key => $value) {
    $link = $linkDB->getConnect();
    $link = mysqli_connect('localhost', 'root', '' ,'main_content');
    $arr = mysqli_query($link, "select * from `score` where `idBlock` = $value ");
    $arr = mysqli_fetch_all($arr,1);
    $name = 'challenger' . $key;
    $$name = new challenger($arr[0]['idBlock'], $arr[0]['score'], $arr[0]['numChoises'], $arr[0]['name']);
}










// new challenger($arr[$key]['idBlock'], $arr[$key]['score'], $arr[$key]['numChoises'], $arr[$key]['name'])

// $challenger1 = new challenger($linkDB[0]['idBlock'], $linkDB[0]['score'], $linkDB[0]['numChoises'], $linkDB[0]['name']);
// $challenger2 = new challenger($linkDB[1]['idBlock'], $linkDB[1]['score'], $linkDB[1]['numChoises'], $linkDB[1]['name']);









?>
<!-- <br>1 -->

Challenger1  <br>
<pre>
    <?php
print_r($challenger0);
print_r($challenger1);
print_r($challenger2);
print_r($challenger3);
print_r($challenger4);
print_r($challenger5);
print_r($challenger6);
    ?>
</pre>

<!-- linkDB <br>
<pre>
    <?php
        print_r($linkDB);
    ?>
</pre> -->