<?php

class linkDB
{
    private $ip ;
    private $login ;
    private $password ;
    private $database ;

    public function __construct($ip, $login, $password, $database){
        $this->ip = $ip;
        $this->login = $login;
        $this->password = $password;
        $this->database = $database;
    }

    public function getAllArray($nameTable, $accoc){
        $array = mysqli_connect($this->ip, $this->login, $this->password, $this->database);
        
        if (mysqli_connect_errno()){
            echo 'Тут какая-то ошибка';  
            exit();     
        };

        $array = mysqli_query($array, "select * from `$nameTable` ");

        if ($accoc == 0 ){
            $accoc = MYSQLI_NUM;
        };

        $array = mysqli_fetch_all($array, $accoc);

        return $array;


    }

    public function getConnect(){
        return mysqli_connect($this->ip, $this->login, $this->password, $this->database);
    }

    
}
