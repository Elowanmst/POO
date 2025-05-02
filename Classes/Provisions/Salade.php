<?php

namespace Classes\Provisions; 

class Salade extends Provision {

    public function __construct()
    {
        $this->icon = '🌳';
        $this->name = 'Salade';
        $this->healthPoints = '-30';
        $this->moodPoints = '90';
        $this->hungerPoints = '40';
        $this->thirstPoints ='40' ;
        $this->addictionPoints = '40';

    }
    
}

