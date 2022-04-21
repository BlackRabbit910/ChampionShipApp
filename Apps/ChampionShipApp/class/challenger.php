<?php

class challenger
{
    public $idBlock ;
    public $score ;
    public $numChoises ;
    public $name ;

    public function __construct($idBlock, $score, $numChoises, $name){
        $this->idBlock = $idBlock;
        $this->score = $score;
        $this->numChoises = $numChoises;
        $this->name = $name;
    }

    public function getIdBlock(){
        return $this->idBlock;
    }

    public function getScore(){
        return $this->score;   
    }
    public function setScore($n){
        $this->score = $n;
    }

    public function getNumChoises(){
        return $this->numChoises;   
    }
    public function setNumChoises($n){
        $this->numChoises = $n;
    }

    public function getName(){
        return $this->name;   
    }


}
