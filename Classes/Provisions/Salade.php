<?php

namespace Classes\Provisions; 

class Salade extends Provisions {

    public function __construct()
    {
        $this->icon = '🌳';
        $this->name = 'Salade';
        $this->healthPoints = '-50';
        $this->moodPoints = '90';
        $this->hungerPoints = '50';
        $this->thirstPoints ='40' ;

    }
}

